class Solver {
    constructor(inputElement, outputElement, stepsElement, variablesElement) {
        this.input = inputElement;
        this.output = outputElement;
        this.steps = stepsElement;
        this.variablesContainer = variablesElement;
        
        this.originalEquation = '';
        this.variableValues = {};
        
        // Listen to main input changes to re-detect variables if manual type
        this.input.addEventListener('input', (e) => {
             // Only detect if it looks like a formula (contains =) and not just a number
             if(this.input.value.includes('=')) {
                 this.detectAndSetupVariables(this.input.value);
             }
        });
    }

    detectAndSetupVariables(eq) {
        // Simple regex to find variables (letters) excluding common math functions
        // Excluding: sin, cos, tan, log, sqrt, diff, integrate, solve, limit, pi, e
        const reserved = ['sin', 'cos', 'tan', 'asin', 'acos', 'atan', 'log', 'ln', 'sqrt', 'diff', 'integrate', 'solve', 'limit', 'pi', 'e', 'exp', 'abs', 'min', 'max'];
        
        // Clean equation of strings or specific constructs if needed, but simple scan for now
        // Match words starting with letter
        const matches = eq.match(/[a-zA-Z_][a-zA-Z0-9_]*/g);
        
        const variables = [];
        if (matches) {
            matches.forEach(m => {
                if (!reserved.includes(m) && !variables.includes(m)) {
                    variables.push(m);
                }
            });
        }

        // If simple x equation, maybe don't show inputs? 
        // Showing inputs is useful for physics formulas mainly.
        // Let's show if > 1 variable OR if it is a formula structure
        
        if (variables.length > 0) {
            this.originalEquation = eq;
            this.renderVariableInputs(variables);
        } else {
            this.variablesContainer.classList.add('hidden');
            this.variablesContainer.innerHTML = '';
        }
    }

    renderVariableInputs(vars) {
        this.variablesContainer.innerHTML = '';
        this.variablesContainer.classList.remove('hidden');
        this.variablesContainer.classList.add('flex');
        
        const title = document.createElement('div');
        title.className = 'w-full text-xs font-bold text-slate-400 uppercase tracking-wider mb-2';
        title.innerText = 'Worksheet Mode: Enter Known Values';
        this.variablesContainer.appendChild(title);

        vars.forEach(v => {
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-center gap-2 bg-slate-900/50 rounded-lg px-3 py-2 border border-white/10 focus-within:border-primary/50';
            
            const label = document.createElement('label');
            label.className = 'font-bold text-primary font-mono';
            label.innerText = v + ' =';
            
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'bg-transparent w-20 text-white focus:outline-none text-sm font-mono';
            input.placeholder = '?';
            input.dataset.var = v;
            
            // If we already have a value in memory, use it (optional preservation)
            
            input.addEventListener('input', (e) => {
                this.updateVariableValue(v, e.target.value);
            });

            wrapper.appendChild(label);
            wrapper.appendChild(input);
            this.variablesContainer.appendChild(wrapper);
        });
    }

    updateVariableValue(variable, value) {
        if (value && value.trim() !== '') {
            this.variableValues[variable] = value;
        } else {
            delete this.variableValues[variable];
        }
        
        this.substituteAndSolve();
    }

    substituteAndSolve() {
        let currentEq = this.originalEquation;
        
        // Naive substitution: string replace (be careful of substrings!)
        // Better: use Nerdamer substitution if possible, but we want to show the specific string in Input
        // Regex with word boundary \b is safer
        
        Object.keys(this.variableValues).forEach(v => {
            const val = this.variableValues[v];
            const regex = new RegExp('\\b' + v + '\\b', 'g');
            currentEq = currentEq.replace(regex, val);
        });
        
        // Update main input
        this.input.value = currentEq;
        
        // Auto-solve logic?
        // Count how many variables remaining in currentEq
        // If 1 variable remains (excluding reserved), auto-solve
        
        const reserved = ['sin', 'cos', 'tan', 'asin', 'acos', 'atan', 'log', 'ln', 'sqrt', 'diff', 'integrate', 'solve', 'limit', 'pi', 'e', 'exp', 'abs', 'min', 'max'];
        const matches = currentEq.match(/[a-zA-Z_][a-zA-Z0-9_]*/g);
        const remainingVars = [];
         if (matches) {
            matches.forEach(m => {
                if (!reserved.includes(m) && !remainingVars.includes(m)) {
                    remainingVars.push(m);
                }
            });
        }
        
        // If exactly 1 variable remains, we can try to solve for it
        if (remainingVars.length === 1) {
             // Debounce or just solve?
             this.solve(currentEq, remainingVars[0]);
        }
    }

    solve(expression, targetVar = null) {
        this.clear();
        
        try {
            // Check for specific commands
            if (expression.startsWith('diff(') || expression.includes('diff(')) {
                this.solveCalculus(expression, 'diff');
            } else if (expression.startsWith('integrate(') || expression.includes('integrate(')) {
                this.solveCalculus(expression, 'integrate');
            } else if (expression.startsWith('limit(') || expression.includes('limit(')) {
                this.solveLimit(expression);
            } else if (expression.includes('=')) {
                this.solveEquation(expression, targetVar);
            } else {
                // formatting check for matrices [[a,b],[c,d]]
                if(expression.includes('[[') && expression.includes(']]')) {
                    this.solveMatrix(expression);
                } else {
                    this.simplifyExpression(expression);
                }
            }
        } catch (e) {
            console.error(e);
            this.displayError("I couldn't understand that. Try 'solve(x^2+2x+1=0)', 'diff(sin(x))', or 'limit(sin(x)/x, x, 0)'.");
        }
    }

    clear() {
        this.output.classList.add('hidden');
        this.steps.innerHTML = '';
    }

    displayError(msg) {
        this.output.classList.remove('hidden');
        this.steps.innerHTML = `<div class="text-red-400 p-4 border border-red-500/20 rounded-lg bg-red-500/10">${msg}</div>`;
    }

    solveEquation(eq, targetVar = null) {
        // If targetVar is not provided, try 'x', or guess
        if (!targetVar) {
             if (eq.includes('x')) targetVar = 'x';
             else {
                 // Find first char
                 const match = eq.match(/[a-zA-Z]/);
                 if (match) targetVar = match[0];
                 else targetVar = 'x';
             }
        }

        this.addStep('Equation Detected', `Solving for <strong>${targetVar}</strong> in: ${eq}`);
        
        try {
            const solution = nerdamer.solve(eq, targetVar);
            const result = solution.toString();
            
            // Check if nerdamer returned empty brackets []
            if (result === '[]') {
                this.addStep('No Solution', 'No real solutions found or equation is invalid.');
                 this.output.classList.remove('hidden');
                 return;
            }

            this.addStep('Symbolic Solution', 
                `Result:`, 
                `<strong class="text-primary text-xl">${targetVar} = ${result}</strong>`
            );
            
            if (result.includes('sqrt') || result.includes('/') || result.includes(',')) {
                 try {
                    // nerdamer .evaluate() might return multiple if array
                    // Handle array of solutions
                    const parts = result.replace(/^\[|\]$/g, '').split(',');
                    const decimals = parts.map(p => {
                        try { return nerdamer(p).evaluate().text(); } catch(e) { return p; }
                    });
                    
                    this.addStep('Decimal Approximation', `${targetVar} ≈ ${decimals.join(', ')}`);
                 } catch(e) {}
            }
        } catch(e) {
             this.displayError("Could not solve equation. " + e.message);
        }
        
        this.output.classList.remove('hidden');
    }

    solveCalculus(expr, type) {
        const action = type === 'diff' ? 'Differentiation' : 'Integration';
        this.addStep(`${action} Detected`, `Processing: ${expr}`);
        const result = nerdamer(expr).toString();
        this.addStep('Result', `<strong class="text-primary text-xl">${result}</strong>`);
        this.output.classList.remove('hidden');
    }

    solveLimit(expr) {
        this.addStep('Limit Detected', `Evaluating: ${expr}`);
        // user inputs limit(expression, variable, value) e.g. limit(sin(x)/x, x, 0)
        const result = nerdamer(expr).toString();
        this.addStep('Limit Result', `<strong class="text-primary text-xl">${result}</strong>`);
        this.output.classList.remove('hidden');
    }

    solveMatrix(expr) {
        this.addStep('Matrix Operation', `Processing: ${expr}`);
        // e.g. determinant([[1,2],[3,4]]) OR invert([[1,2],[3,4]]) OR just [[1,2],[3,4]]+[[1,0],[0,1]]
        // Nerdamer handles these generically if parsed correctly
        const result = nerdamer(expr).toString();
        this.addStep('Result', `<strong class="text-primary text-xl break-all">${result}</strong>`);
        this.output.classList.remove('hidden');
    }

    simplifyExpression(expr) {
        this.addStep('Expression/Command', `Processing: ${expr}`);
        const result = nerdamer(expr).toString();
        this.addStep('Result', `<strong class="text-primary text-xl">${result}</strong>`);
        this.output.classList.remove('hidden');
    }

    addStep(title, ...details) {
        const step = document.createElement('div');
        step.className = 'border-l-2 border-primary/30 pl-4 py-2';
        step.innerHTML = `
            <h4 class="text-sm font-semibold text-slate-300 uppercase tracking-wider">${title}</h4>
            ${details.map(d => `<div class="mt-1 font-mono text-white text-lg break-all">${d}</div>`).join('')}
        `;
        this.steps.appendChild(step);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('equation-input');
    const solveBtn = document.getElementById('solve-btn');
    const output = document.getElementById('solution-output');
    const steps = document.getElementById('solution-steps');
    const varsContainer = document.getElementById('variable-inputs'); // New container

    if (input && solveBtn) {
        const solver = new Solver(input, output, steps, varsContainer);
        
        // Expose instance for external calls
        window.solverInstance = solver;

        solveBtn.addEventListener('click', () => {
             solver.solve(input.value);
        });

        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') solver.solve(input.value);
        });
        
        // Helper global for quick-insert buttons
        window.checkForVariables = () => {
            if(input.value) solver.detectAndSetupVariables(input.value);
        };
    }
});

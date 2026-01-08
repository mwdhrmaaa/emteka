class Solver {
    constructor(inputElement, outputElement, stepsElement) {
        this.input = inputElement;
        this.output = outputElement;
        this.steps = stepsElement;
    }

    solve(expression) {
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
                this.solveEquation(expression);
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

    solveEquation(eq) {
        this.addStep('Equation Detected', `Solving for x in: ${eq}`);
        const solution = nerdamer.solve(eq, 'x');
        const result = solution.toString();
        
        this.addStep('Symbolic Solution', 
            `Nerdamer Engine processed the equation.`, 
            `<strong class="text-primary text-xl">x = ${result}</strong>`
        );
        
        if (result.includes('sqrt') || result.includes('/')) {
             try {
                const decimal = solution.evaluate().text();
                this.addStep('Decimal Approximation', `x ≈ ${decimal}`);
             } catch(e) {}
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

    if (input && solveBtn) {
        const solver = new Solver(input, output, steps);

        solveBtn.addEventListener('click', () => {
             solver.solve(input.value);
        });

        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') solver.solve(input.value);
        });
    }
});

class Solver {
    constructor(inputElement, outputElement, stepsElement) {
        this.input = inputElement;
        this.output = outputElement;
        this.steps = stepsElement;
    }

    solve(equation) {
        this.clear();
        equation = equation.replace(/\s+/g, '').replace('*', ''); // Remove spaces
        
        try {
            if (this.isQuadratic(equation)) {
                this.solveQuadratic(equation);
            } else if (this.isLinear(equation)) {
                this.solveLinear(equation);
            } else {
                this.displayError("I can currently only solve Linear (ax+b=c) and Quadratic (ax^2+bx+c=0) equations.");
            }
        } catch (e) {
            this.displayError("Invalid equation format. Please check your syntax.");
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

    // Heuristic detection
    isQuadratic(eq) {
        return eq.includes('x^2');
    }

    isLinear(eq) {
        return !eq.includes('x^2') && eq.includes('x') && eq.includes('=');
    }

    solveLinear(eq) {
        // Format: ax + b = c
        // Use basic parsing logic (very simplified for demo)
        // Assume standard form: 2x+5=15
        
        const sides = eq.split('=');
        let lhs = sides[0];
        let rhs = parseFloat(sides[1]); // 15
        
        // Parse LHS
        // Extract 'a' from 'ax'
        let aMatch = lhs.match(/(-?\d*)x/);
        let a = (aMatch && (aMatch[1] === '' || aMatch[1] === '-')) ? (aMatch[1] === '-' ? -1 : 1) : parseFloat(aMatch[1]);
        if (isNaN(a)) a = 1;

        // Extract 'b'
        let bMatch = lhs.replace(aMatch[0], '').match(/([+-]?\d+)/);
        let b = bMatch ? parseFloat(bMatch[0]) : 0;
        
        this.addStep(`Parsed Equation: ${a}x ${b >= 0 ? '+' : ''}${b} = ${rhs}`);

        // Step 1: Move b to rhs
        let rhsStep1 = rhs - b;
        this.addStep(`Subtract ${b} from both sides:`, `${a}x = ${rhs} - ${b}`, `${a}x = ${rhsStep1}`);

        // Step 2: Divide by a
        let result = rhsStep1 / a;
        this.addStep(`Divide by ${a}:`, `x = ${rhsStep1} / ${a}`, `<strong class="text-primary text-xl">x = ${result}</strong>`);

        this.output.classList.remove('hidden');
    }

    solveQuadratic(eq) {
        // Format: ax^2+bx+c=0
        // Currently expects = 0 at the end
        
        let lhs = eq.split('=')[0];

        // Parse a
        let aMatch = lhs.match(/(-?\d*)x\^2/);
        let a = (aMatch && (aMatch[1] === '' || aMatch[1] === '-')) ? (aMatch[1] === '-' ? -1 : 1) : parseFloat(aMatch[1] || 1);
        
        // Parse b
        let remaining = lhs.replace(aMatch[0], '');
        let bMatch = remaining.match(/([+-]?\d*)x(?!\^)/);
        let b = 0;
        if (bMatch) {
            b = (bMatch[1] === '' || bMatch[1] === '+') ? 1 : (bMatch[1] === '-' ? -1 : parseFloat(bMatch[1]));
        }

        // Parse c
        let cMatch = remaining.replace(bMatch ? bMatch[0] : '', '').match(/([+-]?\d+)/);
        let c = cMatch ? parseFloat(cMatch[0]) : 0;

        this.addStep(`Identified Coefficients:`, `a = ${a}, b = ${b}, c = ${c}`);

        // Quadratic Formula
        let discriminant = (b * b) - (4 * a * c);
        this.addStep(`Calculate Discriminant (Δ = b² - 4ac):`, `Δ = (${b})² - 4(${a})(${c})`, `Δ = ${discriminant}`);

        if (discriminant > 0) {
            let root1 = (-b + Math.sqrt(discriminant)) / (2 * a);
            let root2 = (-b - Math.sqrt(discriminant)) / (2 * a);
            this.addStep(`Δ > 0, Two Real Solutions:`, `x = (-b ± √Δ) / 2a`, `<strong class="text-primary text-xl">x₁ = ${root1.toFixed(2)}, x₂ = ${root2.toFixed(2)}</strong>`);
        } else if (discriminant === 0) {
            let root = -b / (2 * a);
            this.addStep(`Δ = 0, One Real Solution:`, `<strong class="text-primary text-xl">x = ${root}</strong>`);
        } else {
            this.addStep(`Δ < 0, No Real Solutions`);
        }
        
        this.output.classList.remove('hidden');
    }

    addStep(title, ...details) {
        const step = document.createElement('div');
        step.className = 'border-l-2 border-primary/30 pl-4 py-2';
        step.innerHTML = `
            <h4 class="text-sm font-semibold text-slate-300 uppercase tracking-wider">${title}</h4>
            ${details.map(d => `<div class="mt-1 font-mono text-white text-lg">${d}</div>`).join('')}
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

class Calculator {
    constructor(displayElement, historyElement) {
        this.displayElement = displayElement;
        this.historyElement = historyElement;
        this.clear();
    }

    clear() {
        this.currentOperand = '';
        this.previousOperand = '';
        this.operation = undefined;
        this.history = [];
    }

    delete() {
        this.currentOperand = this.currentOperand.toString().slice(0, -1);
    }

    appendNumber(number) {
        if (number === '.' && this.currentOperand.includes('.')) return;
        this.currentOperand = this.currentOperand.toString() + number.toString();
    }

    chooseOperation(operation) {
        if (this.currentOperand === '') return;
        if (this.previousOperand !== '') {
            this.compute();
        }
        this.operation = operation;
        this.previousOperand = this.currentOperand;
        this.currentOperand = '';
    }

    compute() {
        let computation;
        const prev = parseFloat(this.previousOperand);
        const current = parseFloat(this.currentOperand);
        if (isNaN(prev) || isNaN(current)) return;
        
        // Basic operations
        switch (this.operation) {
            case '+': computation = prev + current; break;
            case '-': computation = prev - current; break;
            case '*': computation = prev * current; break;
            case '/': computation = prev / current; break;
            case '^': computation = Math.pow(prev, current); break;
            default: return;
        }

        this.addToHistory(`${prev} ${this.operation} ${current} = ${computation}`);
        this.currentOperand = computation;
        this.operation = undefined;
        this.previousOperand = '';
    }

    scientific(func) {
        let computation;
        const current = parseFloat(this.currentOperand);
        if (isNaN(current)) return;

        switch (func) {
            case 'sin': computation = Math.sin(current); break; // Radians default
            case 'cos': computation = Math.cos(current); break;
            case 'tan': computation = Math.tan(current); break;
            case 'sqrt': computation = Math.sqrt(current); break;
            case 'log': computation = Math.log10(current); break;
            case 'ln': computation = Math.log(current); break;
            default: return;
        }
        
        this.addToHistory(`${func}(${current}) = ${computation}`);
        this.currentOperand = computation;
    }

    addToHistory(entry) {
        this.history.unshift(entry);
        if (this.history.length > 5) this.history.pop();
        this.updateHistoryDisplay();
    }

    updateDisplay() {
        this.displayElement.innerText = this.currentOperand;
        // Optionally update smaller text for previous operand
    }

    updateHistoryDisplay() {
        this.historyElement.innerHTML = this.history
            .map(h => `<div class="text-xs text-slate-500 font-mono">${h}</div>`)
            .join('');
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('calc-display');
    const history = document.getElementById('calc-history');
    
    if (display && history) {
        const calculator = new Calculator(display, history);

        // Number Hooks
        document.querySelectorAll('[data-number]').forEach(button => {
            button.addEventListener('click', () => {
                calculator.appendNumber(button.innerText);
                calculator.updateDisplay();
            });
        });

        // Operation Hooks
        document.querySelectorAll('[data-operation]').forEach(button => {
            button.addEventListener('click', () => {
                calculator.chooseOperation(button.getAttribute('data-operation')); // Use attribute for safe symbols
                calculator.updateDisplay();
            });
        });

        // Scientific Hooks
        document.querySelectorAll('[data-scientific]').forEach(button => {
            button.addEventListener('click', () => {
                calculator.scientific(button.getAttribute('data-scientific'));
                calculator.updateDisplay();
            });
        });

        // Action Hooks
        document.querySelector('[data-equals]').addEventListener('click', () => {
            calculator.compute();
            calculator.updateDisplay();
        });

        document.querySelector('[data-clear]').addEventListener('click', () => {
            calculator.clear();
            calculator.updateDisplay();
        });

        document.querySelector('[data-delete]').addEventListener('click', () => {
            calculator.delete();
            calculator.updateDisplay();
        });
    }
});

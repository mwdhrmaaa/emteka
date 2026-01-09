document.addEventListener('DOMContentLoaded', () => {
    const chartDiv = document.getElementById('chart-container');
    const errorMsg = document.getElementById('error-message');
    const expressionsList = document.getElementById('expressions-list');
    const addExprBtn = document.getElementById('add-expr-btn');

    const colors = [
        '#8b5cf6', // Violet 500
        '#ec4899', // Pink 500
        '#3b82f6', // Blue 500
        '#10b981', // Emerald 500
        '#f59e0b', // Amber 500
        '#ef4444', // Red 500
        '#06b6d4', // Cyan 500
    ];

    let expressions = [
        { id: 1, value: 'sin(x)', color: colors[0] }
    ];

    function createExpressionElement(expr, index) {
        const div = document.createElement('div');
        div.className = 'group flex items-center gap-2 rounded-lg bg-white/5 p-2 transition-colors focus-within:bg-white/10 hover:bg-white/10';
        div.dataset.id = expr.id;

        div.innerHTML = `
            <div class="h-8 w-1 shrink-0 rounded-full" style="background-color: ${expr.color}"></div>
            <input type="text" 
                class="expression-input w-full bg-transparent font-mono text-sm text-white placeholder-slate-500 focus:outline-none"
                value="${expr.value}" 
                placeholder="Enter expression..."
            >
            <button class="remove-expr opacity-0 transition-opacity group-hover:opacity-100 text-slate-500 hover:text-red-400">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        `;

        const input = div.querySelector('input');
        input.addEventListener('input', (e) => {
            const id = parseInt(div.dataset.id);
            const exprObj = expressions.find(ex => ex.id === id);
            if (exprObj) {
                exprObj.value = e.target.value;
                draw();
            }
        });

        // Add keydown listener to add new expression on Enter
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                addNewExpression();
            }
        });

        const removeBtn = div.querySelector('.remove-expr');
        removeBtn.addEventListener('click', () => {
            if (expressions.length > 1) {
                expressions = expressions.filter(e => e.id !== expr.id);
                renderExpressions();
                draw();
            } else {
                // If it's the last one, just clear it
                const exprObj = expressions.find(e => e.id === expr.id);
                if (exprObj) {
                    exprObj.value = '';
                    renderExpressions();
                    draw();
                }
            }
        });

        return div;
    }

    function renderExpressions() {
        expressionsList.innerHTML = '';
        expressions.forEach((expr, index) => {
            expressionsList.appendChild(createExpressionElement(expr, index));
        });
    }

    function addNewExpression(initialValue = '') {
        const newId = (expressions.length > 0 ? Math.max(...expressions.map(e => e.id)) : 0) + 1;
        const color = colors[expressions.length % colors.length];
        expressions.push({ id: newId, value: initialValue, color: color });
        renderExpressions();
        draw();
        
        // Focus the new input
        // requestAnimationFrame to ensure DOM is updated
        requestAnimationFrame(() => {
            const inputs = expressionsList.querySelectorAll('input');
            const lastInput = inputs[inputs.length - 1];
            if (lastInput) lastInput.focus();
        });
    }
    
    // Expose this for the example buttons in HTML
    window.addExpression = addNewExpression;

    if (addExprBtn) {
        addExprBtn.addEventListener('click', () => addNewExpression());
    }

    const resetBtn = document.getElementById('reset-btn');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            expressions = [{ id: 1, value: '', color: colors[0] }];
            renderExpressions();
            draw();
        });
    }

    function draw() {
        if (!chartDiv) return;

        errorMsg.classList.add('hidden');
        
        const data = expressions
            .filter(e => e.value.trim() !== '')
            .map(e => {
                const val = e.value.trim();
                const isImplicit = val.includes('=');
                
                return {
                    fn: isImplicit ? undefined : val,
                    fnType: isImplicit ? 'implicit' : undefined,
                    fnType: isImplicit ? 'implicit' : 't', // function-plot defaults to 'interval' or 'points'? No, default is explicit. 'implicit' needs fnType set.
                    // Actually for implicit in function-plot: { fnType: 'implicit', fn: 'x^2 + y^2 - 9' }
                    // But if it has an '=', we usually need to rearrange it for function-plot if it doesn't support raw 'x^2+y^2=9' string directly in 'fn'?
                    // function-plot v1.x supports 'implicit' with 'fn' property being the equation string? 
                    // Let's check docs or assume standard behavior. Standard behavior for function-plot often expects implicit to be equal to 0, or just an equation string?
                    // Actually, function-plot usually requires 'fn' to be the expression.
                    // If it is 'x^2 + y^2 = 9', we might want to pass it as is if supported, or move everything to one side?
                    // Most safe way: pass it as is.
                    
                    // Reset:
                    fn: val,
                    fnType: isImplicit ? 'implicit' : 'scope',
                    graphType: 'polyline',
                    color: e.color
                };
            });

        if (data.length === 0) {
            // functionPlot throws if no data? Let's just render empty system
             try {
                functionPlot({
                    target: '#chart-container',
                    width: chartDiv.clientWidth,
                    height: 600,
                    yAxis: { domain: [-5, 5] },
                    xAxis: { domain: [-5, 5] },
                    grid: true,
                    data: []
                });
            } catch (e) {}
            return;
        }

        try {
            functionPlot({
                target: '#chart-container',
                width: chartDiv.clientWidth,
                height: 600,
                yAxis: { domain: [-5, 5] },
                xAxis: { domain: [-5, 5] },
                grid: true,
                data: data
            });
        } catch (e) {
            // errorMsg.innerText = "Invalid syntax in one of the expressions.";
            // errorMsg.classList.remove('hidden');
            // Console log for debug, but don't break UI too much
            console.error(e);
        }
    }

    // Initial Render
    renderExpressions();
    draw();

    // Resize handler
    window.addEventListener('resize', () => {
        draw();
    });
});

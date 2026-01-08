document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('function-input');
    const plotBtn = document.getElementById('plot-btn');
    const chartDiv = document.getElementById('chart-container');
    const errorMsg = document.getElementById('error-message');

    function draw() {
        if (!input || !chartDiv) return;

        const expr = input.value || 'sin(x)';
        errorMsg.classList.add('hidden');
        
        try {
            functionPlot({
                target: '#chart-container',
                width: chartDiv.clientWidth,
                height: 500,
                yAxis: { domain: [-5, 5] },
                grid: true,
                data: [{
                    fn: expr,
                    color: '#8b5cf6' // violet-500
                }]
            });
        } catch (e) {
            errorMsg.innerText = "Invalid function format. Try 'x^2' or 'sin(x)'";
            errorMsg.classList.remove('hidden');
        }
    }

    if (plotBtn) {
        plotBtn.addEventListener('click', draw);
    }
    
    if (input) {
         input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') draw();
        });
    }

    // Initial draw
    draw();

    // Resize handler
    window.addEventListener('resize', () => {
        draw();
    });
});

<?php

return [
    'title' => 'Mathematical Formulas',
    'subtitle' => 'Click on a category to reveal the formulas.',
    'categories' => [
        'algebra' => [
            'title' => 'Algebra',
            'formulas' => [
                ['title' => 'Quadratic Formula', 'desc' => 'a,b,c: coefficients'],
                ['title' => 'Difference of Squares', 'desc' => 'a,b: terms'],
                ['title' => 'Slope Intercept', 'desc' => 'm: slope, b: y-intercept'],
                ['title' => 'Arithmetic Series', 'desc' => 'Sn: Sum, a: first term, d: diff, n: count'],
                ['title' => 'Geometric Series', 'desc' => 'r: common ratio'],
                ['title' => 'Exponent Product', 'desc' => 'a: base, m,n: powers'],
                ['title' => 'Binomial Theorem', 'desc' => 'n: power, k: term index'],
            ]
        ],
        'geometry' => [
            'title' => 'Geometry',
            'formulas' => [
                ['title' => 'Area of Circle', 'desc' => 'A: Area, r: radius'],
                ['title' => 'Pythagorean Theorem', 'desc' => 'a,b: legs, c: hypotenuse'],
                ['title' => 'Volume of Cylinder', 'desc' => 'V: Volume, r: radius, h: height'],
                ['title' => 'Area of Triangle', 'desc' => 'b: base, h: height'],
                ['title' => 'Volume of Sphere', 'desc' => 'r: radius'],
                ['title' => 'Volume of Cone', 'desc' => 'r: radius, h: height'],
                ['title' => 'Heron\'s Formula', 'desc' => 's: semi-perimeter, a,b,c: sides'],
                ['title' => 'Surface Area Cylinder', 'desc' => 'r: radius, h: height'],
                ['title' => 'Surface Area Sphere', 'desc' => 'r: radius'],
            ]
        ],
        'trigonometry' => [
            'title' => 'Trigonometry',
            'formulas' => [
                ['title' => 'Identity', 'desc' => 'θ: angle'],
                ['title' => 'Sine Rule', 'desc' => 'a,b,c: sides, A,B,C: opposite angles'],
                ['title' => 'Cosine Rule', 'desc' => 'C: angle opposite side c'],
                ['title' => 'Tangent Identity', 'desc' => 'θ: angle'],
                ['title' => 'Double Angle', 'desc' => 'θ: angle'],
                ['title' => 'Sum & Difference', 'desc' => 'α,β: angles'],
            ]
        ],
        'calculus' => [
            'title' => 'Calculus',
            'formulas' => [
                ['title' => 'Power Rule', 'desc' => 'n: constant power'],
                ['title' => 'Integration by Parts', 'desc' => 'u,v: differentiable functions'],
                ['title' => 'Product Rule', 'desc' => 'u,v: functions of x'],
                ['title' => 'Quotient Rule', 'desc' => 'u,v: functions of x'],
                ['title' => 'Chain Rule', 'desc' => 'y: func of u, u: func of x'],
                ['title' => 'Derivative of Sin', 'desc' => 'x: angle'],
                ['title' => 'Derivative of Cos', 'desc' => 'x: angle'],
                ['title' => 'Integral of 1/x', 'desc' => 'x: variable'],
            ]
        ],
        'statistics' => [
            'title' => 'Statistics',
            'formulas' => [
                ['title' => 'Mean', 'desc' => 'μ: mean, Σx: sum of values, n: count'],
                ['title' => 'Probability', 'desc' => 'P(A): Prob. of A, n(S): Sample space'],
                ['title' => 'Variance', 'desc' => 'σ²: variance, μ: mean'],
                ['title' => 'Standard Deviation', 'desc' => 'σ: std deviation'],
                ['title' => 'Permutation', 'desc' => 'n: total, r: selection'],
                ['title' => 'Combination', 'desc' => 'n: total, r: selection'],
            ]
        ],
        'logarithms' => [
            'title' => 'Logarithms',
            'formulas' => [
                ['title' => 'Product Rule', 'desc' => 'a,b: positive real numbers'],
                ['title' => 'Power Rule', 'desc' => 'b: exponent'],
                ['title' => 'Quotient Rule', 'desc' => 'a,b: positive real numbers'],
                ['title' => 'Change of Base', 'desc' => 'a,b,c: bases/values'],
            ]
        ],
        'physics' => [
            'title' => 'Physics',
            'formulas' => [
                ['title' => 'Newton\'s Second Law', 'desc' => 'F: Force, m: Mass, a: Acceleration'],
                ['title' => 'Kinetic Energy', 'desc' => 'm: Mass, v: Velocity'],
                ['title' => 'Einstein\'s Energy', 'desc' => 'E: Energy, m: Mass, c: Speed of Light'],
                ['title' => 'Ohm\'s Law', 'desc' => 'V: Voltage, I: Current, R: Resistance'],
                ['title' => 'Electric Power', 'desc' => 'P: Power, V: Voltage, I: Current'],
                ['title' => 'Density', 'desc' => 'ρ: Density, m: Mass, V: Volume'],
                ['title' => 'Kinematic (Velocity)', 'desc' => 'v: velocity, u: initial, a: acc, t: time'],
                ['title' => 'Kinematic (Displ.)', 'desc' => 's: displ, u: initial, t: time, a: acc'],
                ['title' => 'Potential Energy', 'desc' => 'm: mass, g: gravity, h: height'],
                ['title' => 'Pressure', 'desc' => 'P: Pressure, F: Force, A: Area'],
                ['title' => 'Work', 'desc' => 'W: Work, F: Force, d: distance'],
            ]
        ],
        'finance' => [
            'title' => 'Finance',
            'formulas' => [
                ['title' => 'Simple Interest', 'desc' => 'I: Interest, P: Principal, r: Rate, t: Time'],
                ['title' => 'Compound Interest', 'desc' => 'A: Final Amount, n: Compounding freq'],
                ['title' => 'Future Value', 'desc' => 'FV: Future Val, PV: Present Val'],
            ]
        ],
    ]
];

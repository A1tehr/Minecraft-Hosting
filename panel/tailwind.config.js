const colors = require('tailwindcss/colors');

// Melenium Color Scheme: Black, Blue, Green
const gray = {
    50: 'hsl(0, 0%, 97%)',
    100: 'hsl(0, 0%, 91%)',
    200: 'hsl(0, 0%, 82%)',
    300: 'hsl(0, 0%, 65%)',
    400: 'hsl(0, 0%, 53%)',
    500: 'hsl(0, 0%, 43%)',
    600: 'hsl(0, 0%, 37%)',
    700: 'hsl(0, 0%, 15%)',
    800: 'hsl(0, 0%, 10%)',
    900: 'hsl(0, 0%, 5%)',
};

const melenium = {
    // Blues (primary)
    blue: {
        50: '#e6f7ff',
        100: '#b3ebff', 
        200: '#80dfff',
        300: '#4dd2ff',
        400: '#1ac6ff',
        500: '#00baff', // Main blue
        600: '#0099cc',
        700: '#007399',
        800: '#004d66',
        900: '#002633',
    },
    // Greens (accent)
    green: {
        50: '#e6fff2',
        100: '#b3ffdb',
        200: '#80ffc4',
        300: '#4dffad',
        400: '#1aff96',
        500: '#00ff88', // Main green
        600: '#00cc66',
        700: '#009944',
        800: '#006622',
        900: '#003311',
    },
    // Dark theme colors
    dark: {
        50: '#f8f9fa',
        100: '#e9ecef',
        200: '#dee2e6',
        300: '#ced4da',
        400: '#6c757d',
        500: '#495057',
        600: '#343a40',
        700: '#212529',
        800: '#1a1a1a',
        900: '#000000',
    }
};

module.exports = {
    content: [
        './resources/scripts/**/*.{js,ts,tsx}',
    ],
    theme: {
        extend: {
            fontFamily: {
                header: ['"Inter"', '"IBM Plex Sans"', '"Roboto"', 'system-ui', 'sans-serif'],
            },
            colors: {
                black: '#000000',
                // Melenium theme colors
                primary: {
                    50: '#e6f7ff',
                    100: '#b3ebff', 
                    200: '#80dfff',
                    300: '#4dd2ff',
                    400: '#1ac6ff',
                    500: '#00baff', // Main blue
                    600: '#0099cc',
                    700: '#007399',
                    800: '#004d66',
                    900: '#002633',
                },
                secondary: {
                    50: '#e6fff2',
                    100: '#b3ffdb',
                    200: '#80ffc4',
                    300: '#4dffad',
                    400: '#1aff96',
                    500: '#00ff88', // Main green
                    600: '#00cc66',
                    700: '#009944',
                    800: '#006622',
                    900: '#003311',
                },
                gray: {
                    50: '#f8f9fa',
                    100: '#e9ecef',
                    200: '#dee2e6',
                    300: '#ced4da',
                    400: '#6c757d',
                    500: '#495057',
                    600: '#343a40',
                    700: '#212529',
                    800: '#1a1a1a',
                    900: '#000000',
                },
                neutral: {
                    50: '#f8f9fa',
                    100: '#e9ecef',
                    200: '#dee2e6',
                    300: '#ced4da',
                    400: '#6c757d',
                    500: '#495057',
                    600: '#343a40',
                    700: '#212529',
                    800: '#1a1a1a',
                    900: '#000000',
                },
                blue: {
                    50: '#e6f7ff',
                    100: '#b3ebff', 
                    200: '#80dfff',
                    300: '#4dd2ff',
                    400: '#1ac6ff',
                    500: '#00baff', 
                    600: '#0099cc',
                    700: '#007399',
                    800: '#004d66',
                    900: '#002633',
                },
                cyan: {
                    50: '#e6f7ff',
                    100: '#b3ebff', 
                    200: '#80dfff',
                    300: '#4dd2ff',
                    400: '#1ac6ff',
                    500: '#00baff',
                    600: '#0099cc',
                    700: '#007399',
                    800: '#004d66',
                    900: '#002633',
                },
            },
            fontSize: {
                '2xs': '0.625rem',
            },
            transitionDuration: {
                250: '250ms',
            },
            borderColor: theme => ({
                default: theme('colors.neutral.400', 'currentColor'),
            }),
            backgroundImage: {
                'gradient-melenium': 'linear-gradient(135deg, #000000 0%, #1a1a1a 25%, #0a0a0a 50%, #1a1a1a 75%, #000000 100%)',
                'gradient-primary': 'linear-gradient(135deg, #00baff 0%, #0099cc 100%)',
                'gradient-secondary': 'linear-gradient(135deg, #00ff88 0%, #00cc66 100%)',
            },
            animation: {
                'pulse-glow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-in': 'slideIn 0.3s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideIn: {
                    '0%': { transform: 'translateY(-10px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
    ]
};

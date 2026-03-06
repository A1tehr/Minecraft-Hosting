import tw from 'twin.macro';
import { createGlobalStyle } from 'styled-components/macro';

export default createGlobalStyle`
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap');

    :root {
        --app-bg: #f4f7fc;
        --app-surface: #ffffff;
        --app-border: #dbe6f2;
        --app-muted: #6b7a90;
        --app-text: #1f2a3a;
        --app-primary: #4f8cff;
        --app-secondary: #7decd4;
        --soft-shadow: 0 10px 26px rgba(31, 42, 58, 0.08);
    }

    body {
        ${tw`font-sans text-neutral-900`};
        letter-spacing: 0.005em;
        position: relative;
        background:
            radial-gradient(1200px 540px at 0% -5%, rgba(79, 140, 255, 0.12), transparent 60%),
            radial-gradient(900px 440px at 100% -10%, rgba(125, 236, 212, 0.16), transparent 62%),
            linear-gradient(180deg, #f7faff 0%, #f2f6fb 70%, #eef3fa 100%);
        min-height: 100vh;
    }

    h1, h2, h3, h4, h5, h6 {
        ${tw`font-header font-semibold tracking-normal text-neutral-900`};
    }

    p {
        ${tw`text-neutral-700 leading-snug`};
    }

    form {
        ${tw`m-0`};
    }

    textarea, select, input, button, button:focus, button:focus-visible {
        ${tw`outline-none`};
    }

    button {
        transition: all 0.2s ease;
    }

    button:hover {
        transform: translateY(-1px);
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield !important;
    }

    ::-webkit-scrollbar {
        background: transparent;
        width: 10px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 999px;
        background: linear-gradient(180deg, #8eb5ff, #67d9cb);
        border: 2px solid #eef3fa;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #7aa7ff, #4ec9b8);
    }

    ::-webkit-scrollbar-track-piece {
        margin: 4px 0;
        background: rgba(219, 230, 242, 0.7);
        border-radius: 999px;
    }

    ::-webkit-scrollbar-corner {
        background: transparent;
    }

    ::selection {
        background: rgba(79, 140, 255, 0.25);
        color: #1f2a3a;
    }
`;

import tw from 'twin.macro';
import { createGlobalStyle } from 'styled-components/macro';

export default createGlobalStyle`
    body {
        ${tw`font-sans bg-gray-900 text-white`};
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 25%, #0a0a0a 50%, #1a1a1a 75%, #000000 100%);
        letter-spacing: 0.015em;
        position: relative;
    }

    /* Stars background effect like Melenium landing */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(2px 2px at 20px 30px, rgba(255, 255, 255, 0.1), transparent),
            radial-gradient(2px 2px at 40px 70px, rgba(0, 186, 255, 0.2), transparent),
            radial-gradient(1px 1px at 90px 40px, rgba(0, 255, 136, 0.15), transparent),
            radial-gradient(1px 1px at 130px 80px, rgba(255, 255, 255, 0.08), transparent);
        background-repeat: repeat;
        background-size: 200px 150px;
        z-index: -1;
        animation: twinkle 8s ease-in-out infinite alternate;
        pointer-events: none;
    }

    @keyframes twinkle {
        0% { opacity: 0.2; }
        100% { opacity: 0.6; }
    }

    h1, h2, h3, h4, h5, h6 {
        ${tw`font-medium tracking-normal font-header text-white`};
    }

    p {
        ${tw`text-gray-200 leading-snug font-sans`};
    }

    form {
        ${tw`m-0`};
    }

    textarea, select, input, button, button:focus, button:focus-visible {
        ${tw`outline-none`};
    }

    /* Modern button styling */
    button {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    button:hover {
        transform: translateY(-1px);
    }

    button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    button:hover::before {
        left: 100%;
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield !important;
    }

    /* Enhanced Scroll Bar Style with Melenium colors */
    ::-webkit-scrollbar {
        background: none;
        width: 12px;
        height: 12px;
    }

    ::-webkit-scrollbar-thumb {
        border: solid 0 rgb(0 0 0 / 0%);
        border-right-width: 3px;
        border-left-width: 3px;
        -webkit-border-radius: 8px;
        background: linear-gradient(135deg, #00baff, #00ff88);
        box-shadow: inset 0 0 0 1px rgba(0, 186, 255, 0.3);
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #0099cc, #00cc66);
    }

    ::-webkit-scrollbar-track-piece {
        margin: 4px 0;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
    }

    ::-webkit-scrollbar-thumb:horizontal {
        border-right-width: 0;
        border-left-width: 0;
        border-top-width: 3px;
        border-bottom-width: 3px;
        -webkit-border-radius: 8px;
    }

    ::-webkit-scrollbar-corner {
        background: transparent;
    }

    /* Enhanced selection styling */
    ::selection {
        background: linear-gradient(45deg, #00baff, #00ff88);
        color: white;
    }

    /* Glassmorphism effects */
    .glass-effect {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 186, 255, 0.2);
        border-radius: 12px;
    }

    .glass-effect:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(0, 186, 255, 0.4);
    }

    /* Glow effects */
    .glow-primary {
        box-shadow: 0 0 20px rgba(0, 186, 255, 0.2);
    }

    .glow-primary:hover {
        box-shadow: 0 0 30px rgba(0, 186, 255, 0.4);
    }

    .glow-secondary {
        box-shadow: 0 0 20px rgba(0, 255, 136, 0.2);
    }

    .glow-secondary:hover {
        box-shadow: 0 0 30px rgba(0, 255, 136, 0.4);
    }
`;

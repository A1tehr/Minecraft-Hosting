import styled from 'styled-components/macro';
import tw from 'twin.macro';

export default styled.div<{ $hoverable?: boolean }>`
    ${tw`flex rounded-lg no-underline text-white items-center p-4 border transition-all duration-300 overflow-hidden relative`};
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(0, 186, 255, 0.1);

    ${(props) => props.$hoverable !== false && tw`hover:border-primary-500/30`};

    &:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(0, 186, 255, 0.1);
    }

    & .icon {
        ${tw`rounded-full w-16 flex items-center justify-center p-3`};
        background: linear-gradient(135deg, rgba(0, 186, 255, 0.2), rgba(0, 255, 136, 0.1));
        border: 1px solid rgba(0, 186, 255, 0.3);
        color: #00baff;
    }

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 186, 255, 0.05), transparent);
        transition: left 0.5s ease;
    }

    &:hover::before {
        left: 100%;
    }
`;

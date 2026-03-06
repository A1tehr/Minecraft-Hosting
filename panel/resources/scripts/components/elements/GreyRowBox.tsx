import styled from 'styled-components/macro';
import tw from 'twin.macro';

export default styled.div<{ $hoverable?: boolean }>`
    ${tw`flex rounded-2xl no-underline text-neutral-800 items-center p-4 border transition-all duration-300 overflow-hidden relative bg-white`};
    border-color: #dbe6f2;
    box-shadow: 0 10px 24px rgba(31, 42, 58, 0.08);

    ${(props) => props.$hoverable !== false && tw`hover:border-primary-200`};

    &:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(31, 42, 58, 0.12);
    }

    & .icon {
        ${tw`rounded-2xl w-14 h-14 flex items-center justify-center p-3`};
        background: linear-gradient(145deg, #e8f1ff, #defaf6);
        border: 1px solid #cfe1f8;
        color: #4f8cff;
    }
`;

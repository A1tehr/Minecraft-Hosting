import styled from 'styled-components/macro';
import tw, { theme } from 'twin.macro';

const SubNavigation = styled.div`
    ${tw`w-full bg-white overflow-x-auto`};
    border-bottom: 1px solid #dbe6f2;
    box-shadow: 0 8px 22px rgba(31, 42, 58, 0.06);

    & > div {
        ${tw`flex items-center text-sm mx-auto px-2 py-1`};
        max-width: 1200px;

        & > a,
        & > div {
            ${tw`inline-block py-2 px-4 text-neutral-600 no-underline whitespace-nowrap transition-all duration-150 rounded-xl border border-transparent`};

            &:not(:first-of-type) {
                ${tw`ml-2`};
            }

            &:hover {
                ${tw`text-primary-700 bg-primary-50 border-primary-100`};
            }

            &:active,
            &.active {
                ${tw`text-primary-700 bg-primary-100 border-primary-200`};
                box-shadow: inset 0 -2px ${theme`colors.primary.500`.toString()};
            }
        }
    }
`;

export default SubNavigation;

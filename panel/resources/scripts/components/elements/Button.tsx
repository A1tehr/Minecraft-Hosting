import React from 'react';
import styled, { css } from 'styled-components/macro';
import tw from 'twin.macro';
import Spinner from '@/components/elements/Spinner';

interface Props {
    isLoading?: boolean;
    size?: 'xsmall' | 'small' | 'large' | 'xlarge';
    color?: 'green' | 'red' | 'primary' | 'grey';
    isSecondary?: boolean;
}

const ButtonStyle = styled.button<Omit<Props, 'isLoading'>>`
    ${tw`relative inline-block rounded-xl p-2 text-sm font-semibold transition-all duration-150 border`};
    box-shadow: 0 8px 18px rgba(31, 42, 58, 0.12);

    ${(props) =>
        ((!props.isSecondary && !props.color) || props.color === 'primary') &&
        css<Props>`
            ${(props) => !props.isSecondary && tw`bg-primary-500 border-primary-400 border text-white`};

            &:hover:not(:disabled) {
                ${tw`bg-primary-600 border-primary-500`};
            }
        `};

    ${(props) =>
        props.color === 'grey' &&
        css`
            ${tw`border-neutral-200 bg-white text-neutral-700`};

            &:hover:not(:disabled) {
                ${tw`bg-neutral-100 border-neutral-300`};
            }
        `};

    ${(props) =>
        props.color === 'green' &&
        css<Props>`
            ${tw`border-secondary-500 bg-secondary-500 text-white`};

            &:hover:not(:disabled) {
                ${tw`bg-secondary-600 border-secondary-600`};
            }

            ${(props) =>
                props.isSecondary &&
                css`
                    &:active:not(:disabled) {
                        ${tw`bg-secondary-600 border-secondary-600`};
                    }
                `};
        `};

    ${(props) =>
        props.color === 'red' &&
        css<Props>`
            ${tw`border-red-400 bg-red-500 text-white`};

            &:hover:not(:disabled) {
                ${tw`bg-red-600 border-red-500`};
            }

            ${(props) =>
                props.isSecondary &&
                css`
                    &:active:not(:disabled) {
                        ${tw`bg-red-600 border-red-500`};
                    }
                `};
        `};

    ${(props) => props.size === 'xsmall' && tw`px-2 py-1 text-xs`};
    ${(props) => (!props.size || props.size === 'small') && tw`px-4 py-2`};
    ${(props) => props.size === 'large' && tw`p-4 text-sm`};
    ${(props) => props.size === 'xlarge' && tw`p-4 w-full`};

    ${(props) =>
        props.isSecondary &&
        css<Props>`
            ${tw`border-neutral-300 bg-white text-neutral-700 shadow-none`};

            &:hover:not(:disabled) {
                ${tw`text-white`};
                ${(props) => props.color === 'red' && tw`bg-red-500 border-red-500`};
                ${(props) => props.color === 'primary' && tw`bg-primary-500 border-primary-500`};
                ${(props) => props.color === 'green' && tw`bg-secondary-500 border-secondary-500`};
            }
        `};

    &:disabled {
        opacity: 0.65;
        cursor: not-allowed;
        box-shadow: none;
    }
`;

type ComponentProps = Omit<JSX.IntrinsicElements['button'], 'ref' | keyof Props> & Props;

const Button: React.FC<ComponentProps> = ({ children, isLoading, ...props }) => (
    <ButtonStyle {...props}>
        {isLoading && (
            <div css={tw`flex absolute justify-center items-center w-full h-full left-0 top-0`}>
                <Spinner size={'small'} />
            </div>
        )}
        <span css={isLoading ? tw`text-transparent` : undefined}>{children}</span>
    </ButtonStyle>
);

type LinkProps = Omit<JSX.IntrinsicElements['a'], 'ref' | keyof Props> & Props;

const LinkButton: React.FC<LinkProps> = (props) => <ButtonStyle as={'a'} {...props} />;

export { LinkButton, ButtonStyle };
export default Button;

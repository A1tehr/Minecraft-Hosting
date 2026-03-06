import * as React from 'react';
import tw, { TwStyle } from 'twin.macro';
import styled from 'styled-components/macro';

export type FlashMessageType = 'success' | 'info' | 'warning' | 'error';

interface Props {
    title?: string;
    children: string;
    type?: FlashMessageType;
}

const styling = (type?: FlashMessageType): TwStyle | string => {
    switch (type) {
        case 'error':
            return tw`bg-red-50 border-red-200 text-red-700`;
        case 'info':
            return tw`bg-primary-50 border-primary-200 text-primary-700`;
        case 'success':
            return tw`bg-secondary-50 border-secondary-200 text-secondary-700`;
        case 'warning':
            return tw`bg-yellow-50 border-yellow-200 text-yellow-700`;
        default:
            return '';
    }
};

const getBackground = (type?: FlashMessageType): TwStyle | string => {
    switch (type) {
        case 'error':
            return tw`bg-red-500 text-white`;
        case 'info':
            return tw`bg-primary-500 text-white`;
        case 'success':
            return tw`bg-secondary-500 text-white`;
        case 'warning':
            return tw`bg-yellow-500 text-neutral-900`;
        default:
            return '';
    }
};

const Container = styled.div<{ $type?: FlashMessageType }>`
    ${tw`p-3 border items-center leading-normal rounded-xl flex w-full text-sm`};
    ${(props) => styling(props.$type)};
    box-shadow: 0 8px 18px rgba(31, 42, 58, 0.08);
`;
Container.displayName = 'MessageBox.Container';

const MessageBox = ({ title, children, type }: Props) => (
    <Container css={tw`lg:inline-flex`} $type={type} role={'alert'}>
        {title && (
            <span
                className={'title'}
                css={[
                    tw`flex rounded-full uppercase px-2 py-1 text-xs font-bold mr-3 leading-none`,
                    getBackground(type),
                ]}
            >
                {title}
            </span>
        )}
        <span css={tw`mr-2 text-left flex-auto`}>{children}</span>
    </Container>
);
MessageBox.displayName = 'MessageBox';

export default MessageBox;

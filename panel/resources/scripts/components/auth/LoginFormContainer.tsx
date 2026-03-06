import React, { forwardRef } from 'react';
import { Form } from 'formik';
import styled from 'styled-components/macro';
import { breakpoint } from '@/theme';
import FlashMessageRender from '@/components/FlashMessageRender';
import tw from 'twin.macro';

type Props = React.DetailedHTMLProps<React.FormHTMLAttributes<HTMLFormElement>, HTMLFormElement> & {
    title?: string;
};

const Container = styled.div`
    ${breakpoint('sm')`
        ${tw`w-4/5 mx-auto`}
    `};

    ${breakpoint('md')`
        ${tw`p-10`}
    `};

    ${breakpoint('lg')`
        ${tw`w-3/5`}
    `};

    ${breakpoint('xl')`
        ${tw`w-full`}
        max-width: 700px;
    `};
`;

export default forwardRef<HTMLFormElement, Props>(({ title, ...props }, ref) => (
    <Container>
        {title && <h2 css={tw`text-3xl text-center text-neutral-800 font-medium py-4`}>{title}</h2>}
        <FlashMessageRender css={tw`mb-2 px-1`} />
        <Form {...props} ref={ref}>
            <div
                css={tw`w-full bg-white rounded-2xl p-6 md:p-8 mx-1 border border-neutral-200`}
                style={{ boxShadow: '0 16px 32px rgba(31, 42, 58, 0.1)' }}
            >
                <div css={tw`w-full`}>
                    <div css={tw`text-center mb-5`}>
                        <p css={tw`text-xs font-semibold uppercase tracking-[0.2em] text-neutral-500`}>
                            Melenium Panel
                        </p>
                    </div>
                    <div css={tw`w-full max-w-lg mx-auto`}>{props.children}</div>
                </div>
            </div>
        </Form>
        <p css={tw`text-center text-neutral-500 text-xs mt-4`}>
            &copy; 2015 - {new Date().getFullYear()} Melenium Panel
        </p>
    </Container>
));

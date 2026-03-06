import React, { memo } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { IconProp } from '@fortawesome/fontawesome-svg-core';
import tw from 'twin.macro';
import isEqual from 'react-fast-compare';

interface Props {
    icon?: IconProp;
    title: string | React.ReactNode;
    className?: string;
    children: React.ReactNode;
}

const TitledGreyBox = ({ icon, title, children, className }: Props) => (
    <div css={tw`rounded-2xl shadow bg-white border border-neutral-200`} className={className}>
        <div css={tw`bg-neutral-100 rounded-t-2xl p-3 border-b border-neutral-200`}>
            {typeof title === 'string' ? (
                <p css={tw`text-sm uppercase text-neutral-700`}>
                    {icon && <FontAwesomeIcon icon={icon} css={tw`mr-2 text-primary-500`} />}
                    {title}
                </p>
            ) : (
                title
            )}
        </div>
        <div css={tw`p-3`}>{children}</div>
    </div>
);

export default memo(TitledGreyBox, isEqual);

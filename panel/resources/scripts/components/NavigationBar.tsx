import * as React from 'react';
import { useState } from 'react';
import { Link, NavLink } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCogs, faLayerGroup, faSignOutAlt } from '@fortawesome/free-solid-svg-icons';
import { useStoreState } from 'easy-peasy';
import { ApplicationStore } from '@/state';
import SearchContainer from '@/components/dashboard/search/SearchContainer';
import tw from 'twin.macro';
import styled from 'styled-components/macro';
import http from '@/api/http';
import SpinnerOverlay from '@/components/elements/SpinnerOverlay';
import Tooltip from '@/components/elements/tooltip/Tooltip';
import Avatar from '@/components/Avatar';
import { useTranslation } from 'react-i18next';

const RightNavigation = styled.div`
    & > a,
    & > button,
    & > .navigation-link {
        ${tw`flex items-center h-full no-underline text-neutral-600 px-4 cursor-pointer transition-all duration-150 rounded-xl`};
        margin: 0 0.125rem;
        border: 1px solid transparent;

        &:active,
        &:hover {
            ${tw`text-primary-700 bg-primary-50 border-primary-100`};
        }

        &:active,
        &:hover,
        &.active {
            ${tw`text-primary-700 bg-primary-100 border-primary-200`};
            box-shadow: 0 8px 16px rgba(79, 140, 255, 0.15);
        }
    }
`;

const Navigation = styled.div`
    ${tw`w-full`};
    background: rgba(255, 255, 255, 0.88);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(219, 230, 242, 0.95);
    box-shadow: 0 10px 30px rgba(31, 42, 58, 0.08);
`;

const Logo = styled(Link)`
    ${tw`text-2xl font-header px-2 no-underline transition-all duration-200`};
    color: #29364a;
    font-weight: 700;

    &:hover {
        color: #3a69e8;
    }
`;

export default () => {
    const { t } = useTranslation('navigation');
    const rootAdmin = useStoreState((state: ApplicationStore) => state.user.data!.rootAdmin);
    const [isLoggingOut, setIsLoggingOut] = useState(false);

    const onTriggerLogout = () => {
        setIsLoggingOut(true);
        http.post('/auth/logout').finally(() => {
            // @ts-expect-error this is valid
            window.location = '/';
        });
    };

    return (
        <Navigation>
            <SpinnerOverlay visible={isLoggingOut} />
            <div className={'mx-auto w-full flex items-center h-[4.5rem] max-w-[1200px] px-3'}>
                <div id={'logo'} className={'flex-1'}>
                    <Logo to={'/'}>Melenium</Logo>
                </div>
                <RightNavigation className={'flex h-full items-center justify-center'}>
                    <SearchContainer />
                    <Tooltip placement={'bottom'} content={t('dashboard') as string}>
                        <NavLink to={'/'} exact>
                            <FontAwesomeIcon icon={faLayerGroup} />
                        </NavLink>
                    </Tooltip>
                    {rootAdmin && (
                        <Tooltip placement={'bottom'} content={t('admin') as string}>
                            <a href={'/admin'} rel={'noreferrer'}>
                                <FontAwesomeIcon icon={faCogs} />
                            </a>
                        </Tooltip>
                    )}
                    <Tooltip placement={'bottom'} content={t('account_settings') as string}>
                        <NavLink to={'/account'}>
                            <span className={'flex items-center w-5 h-5'}>
                                <Avatar.User />
                            </span>
                        </NavLink>
                    </Tooltip>
                    <Tooltip placement={'bottom'} content={t('sign_out') as string}>
                        <button onClick={onTriggerLogout}>
                            <FontAwesomeIcon icon={faSignOutAlt} />
                        </button>
                    </Tooltip>
                </RightNavigation>
            </div>
        </Navigation>
    );
};

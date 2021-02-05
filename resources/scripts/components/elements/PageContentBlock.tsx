import React, { useEffect } from 'react';
import ContentContainer from '@/components/elements/ContentContainer';
import { CSSTransition } from 'react-transition-group';
import tw from 'twin.macro';
import FlashMessageRender from '@/components/FlashMessageRender';
import { useStoreState } from 'easy-peasy';
import { ApplicationStore } from '@/state';
import { faCodeBranch } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

export interface PageContentBlockProps {
    title?: string;
    className?: string;
    showFlashKey?: string;
}

const VersionsBlock = () => {
    const version = useStoreState((state: ApplicationStore) => state.settings.data!.version);
    const location = useStoreState((state: ApplicationStore) => state.settings.data!.location);
    return (
        <ContentContainer css={tw`mb-4 space-y-2`}>
            <p css={tw`text-center text-neutral-500 text-sm`}>
                <FontAwesomeIcon icon={faCodeBranch}/> {location} - {version.version}
            </p>
            <p css={tw`text-center text-neutral-500 text-sm`}>
                &copy; 2015 - 2020&nbsp;
                <a
                    rel={'noopener nofollow noreferrer'}
                    href={'https://pterodactyl.io'}
                    target={'_blank'}
                    css={tw`no-underline text-neutral-500 hover:text-neutral-300`}
                >
                    Pterodactyl Software
                </a>
            </p>
        </ContentContainer>
    );
};

const PageContentBlock: React.FC<PageContentBlockProps> = ({ title, showFlashKey, className, children }) => {
    useEffect(() => {
        if (title) {
            document.title = title;
        }
    }, [ title ]);

    return (
        <CSSTransition timeout={150} classNames={'fade'} appear in>
            <>
                <ContentContainer css={tw`my-4 sm:my-10`} className={className}>
                    {showFlashKey &&
                    <FlashMessageRender byKey={showFlashKey} css={tw`mb-4`}/>
                    }
                    {children}
                </ContentContainer>
                <VersionsBlock />
            </>
        </CSSTransition>
    );
};

export default PageContentBlock;

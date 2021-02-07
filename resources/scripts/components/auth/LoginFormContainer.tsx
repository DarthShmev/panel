import React, { forwardRef } from 'react';
import { Form } from 'formik';
import styled from 'styled-components/macro';
import { breakpoint } from '@/theme';
import FlashMessageRender from '@/components/FlashMessageRender';
import tw from 'twin.macro';
import { useStoreState } from 'easy-peasy';
import { ApplicationStore } from '@/state';
import { faCodeBranch } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

type Props = React.DetailedHTMLProps<React.FormHTMLAttributes<HTMLFormElement>, HTMLFormElement> & {
    title?: string;
}

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

const Logo = () => {
    return (
        <div css={tw`flex-none select-none mt-6 md:mt-0 self-center`}>
            <img src={'/assets/svgs/pterodactyl.svg'} css={tw`block w-48 md:w-64 mx-auto`} />
        </div>
    );
};

const VersionsBlock = () => {
    const version = useStoreState((state: ApplicationStore) => state.settings.data!.version);
    const location = useStoreState((state: ApplicationStore) => state.settings.data!.location);
    return (
        <div css={tw`mt-4 space-y-2`}>
            <p css={tw`text-center text-neutral-500 text-xs`}>
                <FontAwesomeIcon icon={faCodeBranch}/> {location} - {version.version}
            </p>
            <p css={tw`text-center text-neutral-500 text-xs`}>
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
        </div>
    );
};

export default forwardRef<HTMLFormElement, Props>(({ title, ...props }, ref) => (
    <Container>
        <Logo />
        {title &&
        <h2 css={tw`text-3xl text-center text-neutral-100 font-medium py-4`}>
            {title}
        </h2>
        }
        <FlashMessageRender css={tw`mb-2 px-1`}/>
        <Form {...props} ref={ref}>
            <div css={tw`w-full bg-white shadow-lg rounded-lg p-6 mx-1`}>
                <div css={tw`flex-1`}>
                    {props.children}
                </div>
            </div>
        </Form>
        <VersionsBlock />
    </Container>
));

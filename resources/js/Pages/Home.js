import React from 'react';
import Main from '../Layouts/Main';
import { InertiaLink } from '@inertiajs/inertia-react';

export default function Home(props) {
    return (
        <Main
            // header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Home</h2>}
        >
            <div id={'home-page'} className="d-flex h-100 text-center text-white">

                <div className="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
                    <header className="mb-auto">
                        <div>
                            <h3 className="float-md-start mb-0 nav-title">{process.env.MIX_APP_NAME}</h3>
                            <nav className="nav nav-masthead justify-content-center float-md-end">
                                <InertiaLink className={'nav-link active'} href={route('home')}>
                                    Home
                                </InertiaLink>
                                {/*TODO*/}
                                <InertiaLink className={'nav-link'}  href={'#'}>
                                    Categories
                                </InertiaLink>
                                {/*TODO*/}
                                <InertiaLink className={'nav-link'} href={'#'}>
                                    Contact Us
                                </InertiaLink>
                                <InertiaLink className={'nav-link'} href={'/dashboard'}>
                                    Profile
                                </InertiaLink>
                            </nav>
                        </div>
                    </header>

                    <main className="px-3 d-flex justify-content-around">
                        <div className={'d-block'}>
                            <h1>{process.env.MIX_APP_NAME}</h1>
                            <p className="lead">Replace your assets with others and save your time</p>
                            <p className="lead">
                                <a href="#" className="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
                            </p>
                        </div>
                        <div className={'d-block'}>
                            <i className="re-icon fas fa-people-carry fa-9x" aria-hidden="true"/>
                        </div>
                    </main>
                    <footer className="mt-auto text-white-50">
                        <p>All rights Reserved <a href={process.env.MIX_APP_URL} className="text-white">{process.env.MIX_APP_NAME}</a></p>
                    </footer>
                </div>


            </div>
        </Main>
    );
}

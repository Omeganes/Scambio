import React  from 'react';
import {InertiaLink} from "@inertiajs/inertia-react";
export default function Authenticated({ auth, children }) {

    return (
        <div>
            <nav className="navbar navbar-expand-lg navbar-dark navbar-light text-white p-5">
                <div className="container-fluid">
                    <a className="navbar-brand" href={route('home')}>Scambio</a>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggle-icon"/>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <div className="navbar-nav me-auto mb-2 mb-lg-0" />
                        <div>
                            <ul className={'navbar-nav me-5 mb-lg-0'}>
                                <li><InertiaLink href={'#'} className={'nav-item me-5'}>Contact us</InertiaLink></li>
                                <li><InertiaLink href={route('categories.index')} className={'nav-item me-5'}>Categories</InertiaLink></li>
                                <li><InertiaLink href={route('dashboard')} className={'nav-item me-5'}>{auth.user.name}</InertiaLink></li>
                                <li><a href={route('logout')} className={'nav-item me-5'}>Log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <main>{children}</main>
        </div>
    );
}

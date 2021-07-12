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
                                <li><a href={'/#footer'} className={'nav-item me-5'}>Contact us</a></li>
                                <li><InertiaLink href={route('categories.index')} className={'nav-item me-5'}>Categories</InertiaLink></li>
                                <li>
                                    <div className="dropdown">
                                        <a className="nav-item me-5 dropdown-toggle" href="#" role="button"
                                           id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            {auth.user.name}
                                        </a>

                                        <ul className="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><InertiaLink className="dropdown-item" href={route('dashboard')}>Profile</InertiaLink></li>
                                            <li><a className="dropdown-item" href={route('dashboard.edit')}>Edit Profile</a></li>
                                            <li>
                                                <hr className="dropdown-divider" />
                                            </li>
                                            <li><a className="dropdown-item" href={route('logout')}>Log out</a></li>
                                            <li>
                                                <hr className="dropdown-divider" />
                                            </li>
                                            <li>
                                                <InertiaLink className={'dropdown-item'} href={route('vouchers.index')}>Credit:
                                                    <span className={'ms-1 text-primary'}>{auth.user.credit}</span>
                                                </InertiaLink>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li className="nav-item">
                                    <form className="form-inline d-flex" action={route('products.index')}>
                                        <input className="form-control mr-sm-2 me-1" type="search" placeholder="Search"
                                               aria-label="Search" name="query" />
                                        <button className="btn btn-outline-secondary my-2 my-sm-0"
                                                type="submit">Search
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <main>{children}</main>
        </div>
    );
}

import Authenticated from '@/Layouts/Authenticated';
import React from 'react';
import {InertiaLink} from "@inertiajs/inertia-react";

export default function Dashboard({auth, products}) {
    console.log(products)
    return (
        <Authenticated
            auth={auth}
        >
            <div className={'container'}>
                <div className={'row justify-content-center'}>

                    <div className={'col-2 d-flex flex-column flex-shrink-0 p-3'}>
                        <div className={'sticky-top'}>
                            <InertiaLink href={'#'}
                                         className="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                                <svg className="bi me-2" width="16" height="16">
                                    <use xlinkHref="#grid"/>
                                </svg>
                                <span className="fs-4 text-white">Profile</span>
                            </InertiaLink>
                            <hr/>

                            <div className="card" style={{width: '18rem'}}>
                                <div className="card-body">
                                    <h5 className="card-title">{auth.user.name}</h5>
                                    <h6 className="card-subtitle mb-2 text-muted">{auth.user.phone}</h6>
                                    <p className="card-text">{auth.user.email}</p>
                                    <div className={'mb-2'}>
                                        <a href="#" className="card-link">Number of exchanges:</a>
                                        <a href="#" className="card-link text-info">{auth.user.exchanges_count}</a>
                                    </div>
                                    <br className={'mb-2'} />
                                    <div className={'d-flex justify-content-center'}>
                                        <InertiaLink href={route('dashboard.edit')} className={'btn btn-outline-info'}>
                                            Edit Profile
                                        </InertiaLink>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id={'products'} className={'col-8 container'}>
                        <h1 className={'display-3 text-white'}>Your items</h1>
                        {
                            products.map( product => (
                                <div key={product.id}>
                                    <div
                                        className="row g-0 bg-light rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-250 position-relative">
                                        <div className="col p-4 d-flex flex-column position-relative justify-content-center">
                                            <InertiaLink href={route('products.show', product.id)} className="display-6">{product.name}</InertiaLink>
                                            <p className={'text-muted mb-5'}>{product.description}</p>
                                            <div className="position-absolute bottom-0 start-0 m-3">
                                                <InertiaLink href={route('products.requests.index', product.id)} className={`btn btn-outline-${product.exchange_requests.length === 0 ? 'secondary' : 'primary'} ${product.exchange_requests.length === 0 && 'disabled'}`}>{product.exchange_requests.length} Exchange Requests</InertiaLink>
                                            </div>
                                            <div className="position-absolute bottom-0 end-0 m-3">
                                                <div className={'text-success mb-1 end-0'}>{product.price} LE</div>
                                                <InertiaLink href={route('products.edit', product.id)} className={'btn btn-outline-warning'}>Edit</InertiaLink>
                                            </div>
                                        </div>
                                        <div className="col-auto d-none d-lg-block">
                                            <img src={product.images[0]} className="bd-placeholder-img" width="200" height="250" alt={'category-image'}/>
                                        </div>
                                    </div>
                                </div>
                            ))
                        }
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}

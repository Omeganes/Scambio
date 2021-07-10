import React from 'react';
import Authenticated from "@/Layouts/Authenticated";
import {InertiaLink} from "@inertiajs/inertia-react";


export default function Index({auth, product}) {

    const renderDifference = (difference) => {
        console.log(difference < 0)
        let color = "secondary"
        if(difference > 0) {
            color = "success"
        } else if (difference < 0) {
            color = "danger"
        }

        return (
            <h5 className={`border border-${color} rounded text-${color} text-center p-1`}>
                {difference}
            </h5>
        )
    }

    return(
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
                                        <InertiaLink href={route('dashboard')} className={'btn btn-outline-info'}>
                                            Return to profile
                                        </InertiaLink>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id={'requests'} className={'col-8 container'}>
                        <h1 className={'display-5 text-white'}><span className={'text-dark'}>{product.name}</span> received these exchange requests</h1>
                        {
                            product.exchange_requests.length !== 0?
                                product.exchange_requests.map( request => (
                                    <div key={request.id}>
                                        <div
                                            className="row g-0 bg-light rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-250 position-relative">
                                            <div className="col p-4 d-flex justify-content-between">
                                                <div>
                                                    <h6 className={'text-success'}>Your item:</h6>
                                                    <InertiaLink
                                                        href={route('products.show', request.requested_product.id)}
                                                        className={'display-6'}>
                                                        {request.requested_product.name}
                                                    </InertiaLink>
                                                    <h6 className={'text-warning mt-5'}>Their item:</h6>
                                                    <h1 className={'display-6'}>{request.offered_product.name}</h1>
                                                    <InertiaLink
                                                        href={route('products.show', request.offered_product.id)}
                                                        className={'btn btn-outline-success'}
                                                    >
                                                        View
                                                    </InertiaLink>
                                                </div>
                                                <div className={'d-flex flex-column justify-content-between'}>
                                                    <div>
                                                        <h6 className={'text-warning'}>Difference:</h6>
                                                        {renderDifference(request.requested_product.price - request.offered_product.price)}
                                                    </div>

                                                    <div className="btn-group">
                                                        <button type="button" className="btn btn-warning">{request.status}</button>
                                                        <button type="button" className="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span className="visually-hidden">Toggle Dropdown</span>
                                                        </button>
                                                        <ul className="dropdown-menu">
                                                            <li><a className="dropdown-item bg-success text-white" href="#">accept</a></li>
                                                            <li><a className="dropdown-item bg-danger text-white" href="#">reject</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ))
                                :
                                <h1 className={'display-1'}>No requests received! :(</h1>
                        }
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}

import React from 'react';
import Authenticated from "@/Layouts/Authenticated";
import {InertiaLink} from "@inertiajs/inertia-react";

export default function Index({auth, my_vouchers}) {

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
                                    <div className={'d-flex justify-content-around'}>
                                        <InertiaLink href={'#'} className={'btn btn-outline-info'}>
                                            Add Credit
                                        </InertiaLink>
                                        <InertiaLink href={route('dashboard')} className={'btn btn-outline-success'}>
                                            Profile
                                        </InertiaLink>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id={'products'} className={'col-8 container'}>
                        <h1 className={'display-3 text-white'}>Your items</h1>
                        {
                            my_vouchers.map( voucher => (
                                <div key={voucher.id}>
                                    <div className="row g-0 bg-light overflow-hidden flex-md-row mb-4 shadow-lg p-5 voucher rounded-pill min-h-20 justify-content-around">
                                        <div className={'col-md-6 d-flex flex-column justify-content-between'}>
                                            <h1 className={'display-3 text-success'}>Voucher</h1>
                                            <h6 className={'mt-3'}>Code: <span className={'text-primary'}>{voucher.code}</span></h6>
                                        </div>
                                        <div className={'col-md-3'}>
                                            <h1 className={'border display-6 border-warning p-2 text-center text-success'}>{voucher.value} LE</h1>
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

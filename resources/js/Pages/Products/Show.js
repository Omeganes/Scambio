import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {InertiaLink} from "@inertiajs/inertia-react";

export default function Categories(props) {
    return(
        <Authenticated
            auth={props.auth}
        >
            <div className={'container d-flex justify-content-around align-items-center'}>
                <div id="carouselExampleControls" className="left carousel slide shadow-lg mb-5 bg-body rounded" data-bs-ride="carousel" style={{maxWidth: "400px"}}>
                    <div className="carousel-inner">
                        {
                            props.product.images.map( (image,index) => (
                                <div className={`carousel-item rounded ${index === 0 && "active"}`}>
                                    <img src={image} className="d-block w-100 rounded" alt="..." />
                                </div>
                            ))
                        }
                    </div>
                    <button className="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span className="carousel-control-prev-icon" aria-hidden="true"/>
                        <span className="visually-hidden">Previous</span>
                    </button>
                    <button className="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span className="carousel-control-next-icon" aria-hidden="true"/>
                        <span className="visually-hidden">Next</span>
                    </button>
                </div>

                <div className={'right bg-light p-5 shadow-lg p-3 mb-5 bg-body rounded position-relative'} style={{maxWidth: "50%"}}>
                    <h1 className={'display-1'}>{props.product.name}</h1>
                    <p className={'text-muted fs-3'}>{props.product.description}</p>
                    <h3>Status: <span className={'text-success'}>{props.product.status}</span></h3>
                    <div className="position-absolute bottom-0 end-0 m-3">
                        <h3 className={'text-success'}>{props.product.price} LE</h3>
                        <InertiaLink href={'#'} type="button" className="btn btn-outline-info">Request</InertiaLink>
                    </div>
                </div>

            </div>
        </Authenticated>
    );
}

import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {InertiaLink} from "@inertiajs/inertia-react";

export default function Show({auth, product, owner}) {

    const renderImages = (images) => {
        return images.map( (image, index) => (
            <div key={index} className={`carousel-item rounded ${index === 0 && "active"}`}>
                <img src={image} className="d-block w-100 rounded" alt="..." />
            </div>
        ))
    }

    return(
        <Authenticated
            auth={auth}
        >
            <div className={'container d-flex justify-content-around align-items-center'}>
                <div id="carouselExampleControls" className="left carousel slide mb-5" data-bs-ride="carousel" style={{maxWidth: "500px"}}>
                    <div className="carousel-inner">
                        {renderImages(product.images)}
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
                    <h1 className={'display-1'}>{product.name}</h1>
                    <p className={'text-muted fs-3'}>{product.description}</p>
                    <h3>Category: <span className={'text-success'}>{product.category.name}</span></h3>
                    <h4>Status: <span className={'text-warning'}>{product.status}</span></h4>
                    <h5>Owner Name: <span className={'text-info'}>{owner.name}</span></h5>
                    <h5>Email: <span className={'text-secondary'}>{owner.email}</span></h5>
                    <h5>Phone: <span className={'text-secondary'}>{owner.phone || "No phone provided"}</span></h5>
                    <h6 className={'mb-5'}>Exchanges done by the user: <span className={'text-secondary'}>{owner.exchanges_count}</span></h6>
                    <div className="position-absolute bottom-0 end-0 m-3">
                        <h3 className={'text-success'}>{product.price} LE</h3>
                        {
                            owner.id !== auth.user.id &&
                            <InertiaLink href={route('products.requests.create', product.id)} type="button" className="btn btn-outline-info">Request</InertiaLink>
                        }
                    </div>
                </div>

            </div>
        </Authenticated>
    );
}

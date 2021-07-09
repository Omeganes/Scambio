import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {InertiaLink} from "@inertiajs/inertia-react";

export default function Index({auth, products, current_category, categories}) {
    return(
        <Authenticated
            auth={auth}
        >
            <div className={'container'}>
                <div className={'row justify-content-center'}>
                    <div className="col-2 d-flex flex-column flex-shrink-0 p-3 text-white" >
                        <div className={'sticky-top'}>

                            <InertiaLink href={route('categories.index')}
                                         className="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                                <svg className="bi me-2" width="16" height="16">
                                    <use xlinkHref="#grid"/>
                                </svg>
                                <span className="fs-4">Categories</span>
                            </InertiaLink>
                            <hr/>
                            <ul className="nav nav-pills flex-column mb-auto">
                                {
                                    categories.map( category => (
                                        <li key={category.id}>
                                            <InertiaLink href={route('categories.products.index', category.id)} className="nav-link link-light">
                                                {category.name}
                                            </InertiaLink>
                                        </li>
                                    ))
                                }
                            </ul>

                        </div>
                    </div>

                    <div id={'products'} className={'col-8 container'}>
                        <h1 className={'display-3 text-white'}>{current_category?.name || "Searching"}</h1>
                        {
                            products.length !== 0 ?
                                products.map( product => (
                                    <div key={product.id}>
                                        <div
                                            className="row g-0 bg-light rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-250 position-relative">
                                            <div className="col p-4 d-flex flex-column position-relative justify-content-center">
                                                <InertiaLink href={route('products.show', product.id)} className="display-6">{product.name}</InertiaLink>
                                                <p className={'text-muted'}>{product.description}</p>
                                                <div className="position-absolute bottom-0 end-0 m-3">
                                                    <div className={'text-success'}>{product.price} LE</div>
                                                </div>
                                            </div>
                                            <div className="col-auto d-none d-lg-block">
                                                <img src={product.images[0]} className="bd-placeholder-img" width="200" height="250" alt={'category-image'}/>
                                            </div>
                                        </div>
                                    </div>
                                )) :
                                <h1 className={'display-1'}>Nothing found! :( </h1>
                        }
                    </div>

                </div>
            </div>
        </Authenticated>
    );
}

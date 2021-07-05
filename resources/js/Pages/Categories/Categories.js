import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {InertiaLink} from "@inertiajs/inertia-react";

export default function Categories(props) {
    return(
        <Authenticated
            auth={props.auth}
        >
            <div id={'categories'} className={'container d-flex flex-wrap justify-content-around'}>
                {
                    props.data.map( category => (
                        <div className="col-md-5">
                            <div
                                className="row g-0 bg-light rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div className="col p-4 d-flex flex-column position-static justify-content-center">
                                    <InertiaLink href={route('categories.show', category.id)} className="display-6">{category.name}</InertiaLink>
                                </div>
                                <div className="col-auto d-none d-lg-block">
                                    <img src={category.image} className="bd-placeholder-img" width="200" height="250" alt={'category-image'}/>
                                </div>
                            </div>
                        </div>
                    ))
                }
            </div>
        </Authenticated>
    );
}

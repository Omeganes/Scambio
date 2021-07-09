import React, {useEffect, useRef, useState} from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {useForm} from "@inertiajs/inertia-react";
import Input from '@/Components/Input';
import ValidationErrors from "@/Components/ValidationErrors";
import Button from "@/Components/Button";

export default function Create({auth, product, ownedProducts}) {

    const { data, setData, post, processing, errors } = useForm({
        offered_product_id: ownedProducts[0].id
    });

    const handleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit =  async (e) => {
        e.preventDefault();
        await post(route('products.requests.store', product.id));
    };

    return(
        <Authenticated
            auth={auth}
        >
            <div className={'container justify-content-center d-flex'}>
                <div className={'bg-light shadow-lg p-3 mb-5 rounded'} style={{maxWidth: "50%"}}>


                    <ValidationErrors errors={errors} />

                    <form onSubmit={submit}>
                        <h4 className={'mb-5 text-muted'}>Which item would you like to exchange?</h4>
                        <fieldset className="row m-5">
                            {
                                ownedProducts.map( (product, index) => (
                                    <div className="form-check" key={index}>
                                        <div className={'d-flex justify-content-between'}>
                                            <div>
                                                <input
                                                    className="form-check-input"
                                                    style={{marginTop: "1rem"}}
                                                    type="radio"
                                                    name="offered_product_id"
                                                    id={`product-${product.id}`}
                                                    value={product.id}
                                                    onChange={handleChange}
                                                    checked={data.offered_product_id == product.id}
                                                />
                                                <label className="form-check-label display-6" htmlFor={`product-${product.id}`}>
                                                    {product.name}
                                                </label>
                                            </div>
                                            <div>
                                                <label className={'btn btn-outline-success p-2 mt-2'} htmlFor={`product-${product.id}`}>
                                                    {product.price} LE
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                ))
                            }
                        </fieldset>
                        <Button className="btn btn-primary" processing={processing}>
                            Add belonging
                        </Button>
                    </form>
                </div>
            </div>
        </Authenticated>
    );
}

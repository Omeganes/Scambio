import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {useForm} from "@inertiajs/inertia-react";
import Input from '@/Components/Input';
import ValidationErrors from "@/Components/ValidationErrors";
import Button from "@/Components/Button";

export default function Create(props) {

    const { data, setData, post, processing, errors } = useForm({
        name: '',
        description: '',
        price: '',
        category_id: '',
        status: 'new',
    });

    const handleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit =  async (e) => {
        e.preventDefault();

        await post(route('products.store'));
    };

    return(
        <Authenticated
            auth={props.auth}
        >
            <div className={'container d-flex justify-content-around align-items-center'}>
                <div className={'right bg-light p-5 shadow-lg p-3 mb-5 bg-body rounded position-relative'} style={{maxWidth: "50%"}}>


                    <ValidationErrors errors={errors} />

                    <form onSubmit={submit}>
                        <div className="row mb-3">
                            <label htmlFor="input-name" className="col-sm-2 col-form-label">Name</label>
                            <div className="col-sm-10">
                                <Input
                                    type="text"
                                    name={'name'}
                                    value={data.name}
                                    isFocused={true}
                                    handleChange={handleChange}
                                    className="form-control"
                                    id="input-name" required />
                            </div>
                        </div>
                        <div className="row mb-3">
                            <label htmlFor="input-price" className="col-sm-2 col-form-label">Price</label>
                            <div className="col-sm-10">
                                <Input
                                    type="number"
                                    min={'1'}
                                    name={'price'}
                                    value={data.price}
                                    handleChange={handleChange}
                                    className="form-control"
                                    id="input-price" required/>
                            </div>
                        </div>
                        <fieldset className="row mb-3">
                            <legend className="col-form-label col-sm-3 pt-0">Category</legend>
                            <div className="col-sm-9">
                                {
                                    props.categories.map( (category, index) => (
                                        <div className="form-check" key={index}>
                                            <input
                                                className="form-check-input"
                                                type="radio"
                                                name="category_id"
                                                id={`category-${category.id}`}
                                                value={category.id}
                                                onChange={handleChange}
                                            />
                                            <label className="form-check-label" htmlFor={`category-${category.id}`}>
                                                {category.name}
                                            </label>
                                        </div>
                                    ))
                                }
                            </div>
                        </fieldset>
                        <div className="mb-3">
                            <label htmlFor="description-input" className="form-label">Description</label>
                            <textarea
                                onChange={handleChange}
                                name={'description'} className="form-control" id="description-input" rows="3" required/>
                        </div>
                        <fieldset className="row mb-3">
                            <legend className="col-form-label col-sm-2 pt-0">Status</legend>
                            <div className="col-sm-10">
                                <div className="form-check">
                                    <input className="form-check-input" type="radio" name="status" id="status-new"
                                           value="new" checked
                                           onChange={handleChange}/>
                                        <label className="form-check-label" htmlFor="status-new">
                                            New
                                        </label>
                                </div>
                                <div className="form-check">
                                    <input className="form-check-input" type="radio" name="status" id="status-used"
                                           value="used"
                                           onChange={handleChange}
                                    />
                                        <label className="form-check-label" htmlFor="status-used">
                                            Used
                                        </label>
                                </div>
                            </div>
                        </fieldset>
                        <Button className="btn btn-primary" processing={processing}>
                            Add good
                        </Button>
                    </form>
                </div>

            </div>
        </Authenticated>
    );
}

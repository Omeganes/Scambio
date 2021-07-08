import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {useForm} from "@inertiajs/inertia-react";
import Input from '@/Components/Input';
import ValidationErrors from "@/Components/ValidationErrors";
import Button from "@/Components/Button";

export default function Create({auth}) {

    const user = auth.user;

    const { data, setData, post, processing, errors } = useForm({
        name: user.name,
        email: user.email,
        password: '',
        password_confirmation: '',
        phone: user.phone || '',
        account_number: '',
        _method: 'PATCH'
    });

    const handleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit =  async (e) => {
        e.preventDefault();
        await post(route('dashboard.update'));
    };

    return(
        <Authenticated
            auth={auth}
        >
            <div className={'d-flex justify-content-center align-items-center'}>
                <div className={'bg-light shadow-lg p-5 mb-5 bg-body rounded position-relative'} style={{maxWidth: "50%"}}>


                    <ValidationErrors errors={errors} />

                    <form onSubmit={submit} className={'row g-3'}>
                        <div className="col-md-6">
                            <label htmlFor="name-input" className="form-label">Name</label>
                            <Input type="text" className="form-control" id="name-input"
                                   name={'name'} value={data.name} isFocused={true} handleChange={handleChange}
                            />
                        </div>
                        <div className="col-md-6">
                            <label htmlFor="phone-input" className="form-label">Phone Number</label>
                            <Input type="email" className="form-control" id="phone-input" name={'phone'}
                                   value={data.phone} placeholder={'0123456789'} handleChange={handleChange}
                            />
                        </div>
                        <div className="col-12">
                            <label htmlFor="email-input" className="form-label">Email</label>
                            <Input type="text" className="form-control" id="email-input"
                                   name={'email'} value={data.email} handleChange={handleChange}
                            />
                        </div>
                        <div className="col-md-6">
                            <label htmlFor="password-input" className="form-label">Password</label>
                            <Input type="text" className="form-control" id="password-input" name={'password'}
                                   value={data.password} handleChange={handleChange}
                            />
                        </div>
                        <div className="col-md-6">
                            <label htmlFor="password-confirmation-input" className="form-label">Confirm Password</label>
                            <Input type="password" className="form-control" id="password-confirmation-input"
                                   name={'password_confirmation'} value={data.password_confirmation}
                                   handleChange={handleChange}
                            />
                        </div>
                        <div className="col-12">
                            <label htmlFor="account-number-input" className="form-label">Credit Card number</label>
                            <Input type="text" className="form-control" id="account-number-input"
                                   name={'account_number'} placeholder="1234-5678-9012-3456"
                                   handleChange={handleChange}
                            />
                        </div>
                        <div className="col-12">
                            <Button type="submit" className="btn btn-primary" processing={processing}>
                                Edit Profile
                            </Button>
                        </div>
                    </form>
                </div>
            </div>

        </Authenticated>
    );
}

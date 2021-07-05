import Button from '@/Components/Button';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import React, { useEffect } from 'react';
import ValidationErrors from '@/Components/ValidationErrors';
import { InertiaLink } from '@inertiajs/inertia-react';
import { useForm } from '@inertiajs/inertia-react';
import Checkbox from "@/Components/Checkbox";

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <Guest>

            <div className={'form-signin position-absolute top-50 start-50 translate-middle'}>
                {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

                <ValidationErrors errors={errors} />


                <form onSubmit={submit}>
                    <img className="mb-4 img" src="assets/img/logpic.png" alt="" width="72" height="57" />
                    <h1 className="h3 mb-3 fw-normal">Register to Scambio!</h1>

                    <div>

                        <Input
                            type="text"
                            name="name"
                            value={data.name}
                            className="form-control top bottom"
                            placeholder={'Name'}
                            autoComplete="name"
                            isFocused={true}
                            handleChange={onHandleChange}
                            required
                        />


                        <Input
                            type="email"
                            name="email"
                            value={data.email}
                            className="form-control top bottom"
                            placeholder={'Email'}
                            autoComplete="username"
                            handleChange={onHandleChange}
                            required
                        />


                        <Input
                            type="password"
                            name="password"
                            value={data.password}
                            className="form-control top bottom"
                            placeholder={'Password'}
                            autoComplete="new-password"
                            handleChange={onHandleChange}
                            required
                        />

                        <Input
                            type="password"
                            name="password_confirmation"
                            value={data.password_confirmation}
                            className="form-control top bottom"
                            placeholder={'Confirm Password'}
                            handleChange={onHandleChange}
                            required
                        />

                    </div>
                    <Button className="w-100 btn btn-lg btn-primary top bottom" processing={processing}>
                        Register
                    </Button>

                    <InertiaLink href={route('login')} className={'pt-2'}>
                        Already registered?
                    </InertiaLink>
                    <p className="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
                </form>
            </div>
        </Guest>
    );
}

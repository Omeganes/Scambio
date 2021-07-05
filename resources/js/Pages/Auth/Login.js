import Button from '@/Components/Button';
import Checkbox from '@/Components/Checkbox';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import React, { useEffect } from 'react';
import ValidationErrors from '@/Components/ValidationErrors';
import { useForm } from '@inertiajs/inertia-react';

export default function Login({ status }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <Guest>
            <div className={'form-signin'}>
                {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

                <ValidationErrors errors={errors} />


                <form onSubmit={submit}>
                    <img className="mb-4 img" src="assets/img/logpic.png" alt="" width="72" height="57" />
                    <h1 className="h3 mb-3 fw-normal">Login to Scambio!</h1>

                    <div>
                        <Input
                            type="text"
                            name="email"
                            value={data.email}
                            autoComplete="username"
                            isFocused={true}
                            handleChange={onHandleChange}
                            className="form-control top"
                            placeholder="user name" required
                        />

                        <Input
                            type="password"
                            name="password"
                            value={data.password}
                            autoComplete="current-password"
                            handleChange={onHandleChange}
                            className="form-control bottom" placeholder="password"
                            required
                        />

                        <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} />
                        <span className="ml-2 text-sm text-gray-600">Remember me</span>
                    </div>
                    <Button className="w-100 btn btn-lg btn-primary" processing={processing}>
                        Log me in
                    </Button>

                    {/* TODO */}
                    <a href="Signup.html">sign up first</a>
                    <p className="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
                </form>
            </div>
        </Guest>
    );
}

import React from 'react';
import Main from '../Layouts/Main';
import { InertiaLink } from '@inertiajs/inertia-react';

export default function Welcome(props) {
    return (
        <Main
            auth={props.auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Home</h2>}
        />
    );
}

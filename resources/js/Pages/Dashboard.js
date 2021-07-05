import Authenticated from '@/Layouts/Authenticated';
import React from 'react';

export default function Dashboard(props) {
    return (
        <Authenticated
            auth={props.auth}
        >
        </Authenticated>
    );
}

import React from 'react';
import Authenticated from "@/Layouts/Authenticated";


export default function Index({auth, requests}) {

    return(

        <Authenticated
            auth={auth}
        >
            {requests.map(request => request.status)}
        </Authenticated>
    );
}

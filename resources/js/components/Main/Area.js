import React, { useState } from 'react';
import useAxios from 'axios-hooks';
import Axios from 'axios';
import Action from '../components/Action';

export default function Area() {
    const [{ data: locationData, loading: loadingLocation }] = useAxios('/location');
    const [{ data: actionData, loading: loadingAction }] = useAxios('/action');
    const [show, setShow] = useState(false); // modal show/hide handling

    if (loadingLocation || loadingAction) {
        return 'Loading';
    }
    const sendAction = (actionId) => {
        Axios.get(`/action/${actionId}`).then((res) => {
            console.log(res.data);
        });
    };

    const actions = actionData.map((action) => (
        <tr className="separating_line" key={action.id}>
            <td onClick={() => setShow(true)}>{action.name}</td>
        </tr>
    ));

    return (
        <>
            <h2>{locationData.territory.name}</h2>
            <h6>{locationData.name}</h6>
            <p className="description">{locationData.description}</p>

            <table className="action">
                <thead>
                    <tr>
                        <td>{locationData.name}</td>
                    </tr>
                </thead>
                <tbody>{actions}</tbody>
            </table>
            <Action onClose={() => setShow(false)} show={show} />
        </>
    );
}

import React from 'react';
import useAxios from 'axios-hooks';

export default function Area() {
    const [{ data: locationData, loading: loadingLocation }] = useAxios('/location');

    if (loadingLocation) {
        return 'Loading';
    }

    return (
        <div>
            <h2>{locationData.territory.name}</h2>
            <h6>{locationData.name}</h6>
            <p className="description">{locationData.description}</p>
        </div>
    );
}

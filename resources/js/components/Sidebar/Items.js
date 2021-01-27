import React from 'react';
import useAxios from 'axios-hooks';

export default function Items() {
    const [{ data: itemsData, loading: loadingItems }] = useAxios('/items');

    if (loadingItems) {
        return 'Loading';
    }

    const items = itemsData.map((item) => (
        <div key={item.items.id} className="divider">
            <span className="level">{item.amount}</span>
            <span className="type">{item.items.name}</span>
        </div>
    ));

    return (
        <div className="items">
            <h2>Inventory</h2>
            <div className="body">{items}</div>
        </div>
    );
}

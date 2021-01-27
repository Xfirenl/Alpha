import React from 'react';
import Items from '../components/Sidebar/Items';

export default function RightSideBar(itemsData) {
    return (
        <div>
            <Items itemsData={itemsData.itemsData} />
        </div>
    );
}

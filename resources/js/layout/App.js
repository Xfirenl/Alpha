import React, { props } from 'react';
import useAxios from 'axios-hooks';

import LeftSideBar from './LeftSideBar';
import RightSideBar from './RightSideBar';
import Content from './Content';

export default function App() {
    const [{ data: itemsData, loading: loadingItems }] = useAxios('/items');

    if (loadingItems) {
        return 'Loading';
    }
    return (
        <>
            <div className="left left-sidebar sidebar" id="left-sidebar">
                <LeftSideBar />
            </div>
            <div className="middle" id="content">
                <Content />
            </div>
            <div className="right right-sidebar sidebar" id="right-sidebar">
                <RightSideBar itemsData={[itemsData]} />
            </div>
        </>
    );
}

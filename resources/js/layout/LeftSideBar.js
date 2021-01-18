import React from 'react';
import Player from '../components/Sidebar/Player';
import Skills from '../components/Sidebar/Skills';

function LeftSideBar() {
    return (
        <div>
            <a href="/logout">Logout</a>
            <Player />
            <Skills />
        </div>
    );
}

export default LeftSideBar;

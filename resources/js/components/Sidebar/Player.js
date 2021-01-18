import React from 'react';
import useAxios from 'axios-hooks';

export default function Player() {
    const [{ data: playerData, loading: loadingPlayer }] = useAxios('/player');

    if (loadingPlayer) {
        return 'Loading';
    }

    return (
        <div className="player">
            <h2>{playerData.name}</h2>
            <div className="body">
                <div className="divider">
                    <span className="type flavour">HP </span>
                    <span className="level">{playerData.hp}</span>
                </div>
                <div className="divider">
                    <span className="type flavour">Level </span>
                    <span className="level">{playerData.level}</span>
                </div>
                <div className="divider">
                    <span className="type flavour">Exp </span>
                    <span className="level">{playerData.experience}</span>
                </div>
            </div>
        </div>
    );
}

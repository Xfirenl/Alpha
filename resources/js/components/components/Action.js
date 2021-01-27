import React, { useState, useEffect } from 'react';
import PropTypes from 'prop-types';

export default function Action(modalState) {
    const [counter, setCounter] = useState(60);

    useEffect(() => {
        if (counter > 0) {
            setTimeout(() => setCounter(counter - 1), 1000);
        } else {
            setCounter(60);
        }
    }, [counter]);

    if (!modalState.show) {
        return null;
    }

    return (
        <div className="modal">
            <div className="header">
                <button type="button" onClick={modalState.onClose}>
                    close
                </button>
            </div>
            <h6>*action name*</h6>
            <p>{counter}</p>
        </div>
    );
}

Action.propTypes = {
    modalState: PropTypes.bool,
};
Action.defaultProps = {
    modalState: false,
};

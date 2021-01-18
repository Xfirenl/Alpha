import React from 'react';
import Shop from '../components/Main/Shop';
import Area from '../components/Main/Area';

const Nav = [
    { component: <Area />, title: 'Area' },
    { component: <Shop />, title: 'Shop' },
];

export default function Index() {
    const [component, setComponent] = React.useState(Nav[0].component);

    return (
        <div className="content">
            <ul className="center-nav">
                {Nav.map((item) => (
                    <button
                        type="button"
                        key={item.title} /* TODO: use a different key identifier */
                        onClick={() => setComponent(item.component)}
                    >
                        {item.title}
                    </button>
                ))}
            </ul>
            <div className="container">{component}</div>
        </div>
    );
}

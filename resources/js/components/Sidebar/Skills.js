import React from 'react';
import useAxios from 'axios-hooks';

export default function Skills() {
    const [{ data: skillData, loading: loadingSkill }] = useAxios('/skills');

    if (loadingSkill) {
        return 'Loading';
    }

    const skills = skillData.map((skill) => (
        <div className="divider" key={skill.id}>
            <span className="type flavour">{skill.name}</span>
            <span className="level">{skill.level}</span>
        </div>
    ));

    return (
        <div>
            <div className="header">
                <h2>Skills</h2>
            </div>
            <div className="body">{skills}</div>
        </div>
    );
}

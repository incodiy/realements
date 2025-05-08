import React from 'react';
import ReactDOM from 'react-dom';
import Form from './components/Form';

const App = () => {
    const { elements, formConfig } = window.realementsData;

    return (
        <div className="realements-container">
            {formConfig ? (
                <Form formConfig={formConfig} elements={elements} />
            ) : (
                elements.map((element, index) => (
                    element.type === 'select' ? (
                        <Select key={index} element={element} />
                    ) : null
                ))
            )}
        </div>
    );
};

if (document.getElementById('realements-form')) {
    ReactDOM.render(<App />, document.getElementById('realements-form'));
}
import React from 'react';
import Select from './Select';
import Button from './Button';

const Form = ({ formConfig, elements }) => {
    const handleSubmit = (e) => {
        if (!formConfig) return;
        // Add custom form handling logic here
    };

    return (
        <form 
            method={formConfig?.method} 
            action={formConfig?.action} 
            encType={formConfig?.enctype}
            onSubmit={handleSubmit}
            {...formConfig?.attributes}
        >
            {formConfig?.method === 'POST' && (
                <meta name="csrf-token" content="{{ csrf_token() }}" />
            )}
            
            {elements.map((element, index) => {
                switch(element.type) {
                    case 'select':
                        return <Select key={index} element={element} />;
                    // Add other element types here
                    default:
                        return null;
                }
            })}
            
            {formConfig?.submitButton && (
                <Button
                    className={formConfig.buttonConfig?.class}
                    style={formConfig.buttonConfig?.style}
                >
                    {formConfig.buttonConfig?.text || 'Submit'}
                </Button>
            )}
        </form>
    );
};

export default Form;
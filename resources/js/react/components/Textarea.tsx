import type { ReactNode } from "react";
import type {
    FieldValues,
    RegisterOptions,
    UseFormRegister,
} from "react-hook-form";

const styleError = {
    borderColor: "#EC008C #EC008C #EC008C rgb(236, 89, 144)",
    borderStyle: "solid",
    borderWidth: "1px 1px 1px 8px",
    borderImage: "none 100% / 1 / 0 stretch",
};

type TTextarea = {
    name: string;
    disabled?: boolean;
    rows?: number;
    validation?: {
        register: UseFormRegister<FieldValues>;
        rules?: Pick<
            RegisterOptions<FieldValues>,
            "pattern" | "maxLength" | "minLength" | "validate" | "required"
        >;
    };
    validationStyleError?: boolean;
    validationMessageError?: string;
    className?: string;
    placeholder?: string;
    value?: string;
    label?: string | ReactNode;
    id?: boolean;
    onChange?: () => void;
    onKeyDown?: () => void;
    onClick?: () => void;
};

function Textarea(options: TTextarea) {
    return (
        <>
            {options.label && (
                <label
                    htmlFor={options.name}
                    className="text-paragraph pointer-events-none mb-1 block font-medium"
                >
                    {options.label}
                </label>
            )}

            <textarea
                name={options.name}
                className={`border-1 w-full resize-none appearance-none rounded border border-default-300 bg-white p-1.5 text-base text-default-900 transition-all focus:border-primary-500 focus:ring-primary-500 disabled:border-neutral-100 disabled:bg-neutral-100 dark:border-default-600 dark:bg-default-800 dark:text-white dark:placeholder-default-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:border-gray-700 dark:disabled:bg-default-800 dark:disabled:opacity-60 ${options?.className}`}
                cols={30}
                rows={options.rows ?? 5}
                {...(options.value && { value: options.value })}
                {...(options.id && { id: options.name })}
                {...(options.placeholder && {
                    placeholder: options.placeholder,
                })}
                {...(options.disabled && { disabled: options.disabled })}
                {...(options.validation &&
                    options.validation.register(
                        options.name,
                        options.validation.rules
                    ))}
                {...(options.validationStyleError && { style: styleError })}
                {...(options.onClick && { onClick: options.onClick })}
                {...(options.onChange && { onChange: options.onClick })}
                {...(options.onKeyDown && { onKeyDown: options.onClick })}
            >
                {options.value}
            </textarea>

            {options.validationMessageError && (
                <p className="small font-medium text-error">
                    {options.validationMessageError}
                </p>
            )}
        </>
    );
}

export default Textarea;

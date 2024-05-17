import { twMerge } from 'tailwind-merge'

function Switch({
	name = '',
	checked = false,
	iswFull = false,
	className = '',
	classNameLabel = '',
	classNameTitle = '',
	children,
	handlerChangeInput = () => {},
	handlerChange = null,
	validation = null,
	validationStyleError = null,
	validationMessageError = null,
}) {
	return (
		<>
			<label
				className={twMerge(
					`relative mr-1 inline-flex cursor-pointer items-center ${iswFull ? 'w-full' : ''}`,
					classNameLabel
				)}>
				<input
					tabIndex={-1}
					type='checkbox'
					name={name}
					className='peer sr-only'
					checked={checked}
					onChange={handlerChangeInput}
					{...(validation && validation.register(name, validation.rules))}
				/>
				<div
					{...(handlerChange && { onClick: handlerChange })}
					className={twMerge(
						`peer relative h-[16px] w-[28px] rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-[12px] after:w-[12px] after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white dark:border-gray-600 dark:bg-gray-600`,
						className
					)}></div>
				{children && (
					<span
						className={twMerge(
							`text-paragraph ml-3 w-[calc(100%-40px)] ${validationStyleError ? 'text-error' : ''}`,
							classNameTitle
						)}>
						{children}
					</span>
				)}
			</label>

			{validationMessageError && <p className='small font-medium text-error'>{validationMessageError}</p>}
		</>
	)
}

export default Switch

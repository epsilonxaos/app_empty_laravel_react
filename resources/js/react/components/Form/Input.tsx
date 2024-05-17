import { twMerge } from 'tailwind-merge'

import { useState } from 'react'
import { DiReact } from 'react-icons/di'

const styleError = {
	borderColor: '#EC008C #EC008C #EC008C rgb(236, 89, 144)',
	borderStyle: 'solid',
	borderWidth: '1px 1px 1px 8px',
	borderImage: 'none 100% / 1 / 0 stretch',
}

const InputIcon = props => {
	const {
		type = 'text',
		name = '',
		label = '',
		placeholder = '',
		className = { icon: '', input: '' },
		icon = <DiReact></DiReact>,
		handlerChange = null,
		handlerKeyDown = null,
		handlerEnterKey = null,
		autoComplete = null,
		disabled = null,
		validation = null,
		validationStyleError = null,
		validationMessageError = null,
	} = props

	return (
		<>
			{label && (
				<label
					{...(name && { htmlFor: name })}
					className='text-paragraph pointer-events-none mb-1 block font-medium'>
					{label}
				</label>
			)}
			<div className='relative'>
				<div
					className={twMerge(
						`pointer-events-none absolute inset-y-0 left-0 flex items-center justify-center pl-3 text-xl text-default-500 dark:text-default-300 ${className.icon}`
					)}>
					{icon}
				</div>
				<input
					{...(name && { id: name })}
					{...{ type }}
					{...{ name }}
					{...{ placeholder }}
					className={twMerge(
						`border-1 h-[32px] w-full appearance-none rounded border border-default-300 bg-white p-0.5 pl-10 text-base text-default-900 transition-all focus:border-primary-500 focus:ring-primary-500 disabled:border-neutral-100 disabled:bg-neutral-100 dark:border-default-600 dark:bg-default-800 dark:text-white dark:placeholder-default-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:border-gray-700 dark:disabled:bg-default-800 dark:disabled:opacity-60 ${className.input}`
					)}
					{...{ disabled }}
					{...(handlerChange && { onChange: handlerChange })}
					{...(handlerKeyDown && {
						onKeyDown: event => {
							if (handlerKeyDown) handlerKeyDown(event)
							if (event.key === 'Enter' && handlerEnterKey) handlerEnterKey(event)
						},
					})}
					{...(autoComplete && { autoComplete })}
					{...(validation && validation.register(name, validation.rules))}
					{...(validationStyleError && { style: styleError })}
				/>
			</div>
			{validationMessageError && <p className='small font-medium text-error'>{validationMessageError}</p>}
		</>
	)
}

let setValueDebouncer = null

function InputIconDebouced(props) {
	const [inputValue, setInputValue] = useState('')
	const { handlerChange = false, handlerChangeDebounce = false, delayDebounce = 300 } = props

	function handlerSetValue(event) {
		setInputValue(event.target.value)
		if (handlerChange) {
			handlerChange(event)
		}
		if (handlerChangeDebounce) {
			clearTimeout(setValueDebouncer)
			setValueDebouncer = setTimeout(function () {
				handlerChangeDebounce(event)
			}, delayDebounce)
		}
	}
	return (
		<InputIcon
			handlerChange={event => {
				handlerSetValue(event)
			}}
			value={inputValue}
			{...props}></InputIcon>
	)
}
function Input({
	type = 'text',
	name = '',
	className = '',
	placeholder = '',
	value,
	label = null,
	id = null,
	handleChange,
	handleKeyDown = null,
	disabled = null,
	autoComplete = null,
	validation = null,
	validationStyleError = null,
	validationMessageError = null,
}) {
	return (
		<>
			{label && (
				<label
					htmlFor={id}
					className='text-paragraph pointer-events-none mb-1 block font-medium'>
					{label}
				</label>
			)}

			<input
				name={name}
				type={type}
				placeholder={placeholder}
				className={twMerge(
					`border-1 h-[32px] w-full appearance-none rounded border border-default-300 bg-white p-1.5 text-base text-default-900 transition-all focus:border-primary-500 focus:ring-primary-500 disabled:border-neutral-100 disabled:bg-neutral-100 dark:border-default-600 dark:bg-default-800 dark:text-white dark:placeholder-default-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:border-gray-700 dark:disabled:bg-default-800 dark:disabled:opacity-60`,
					className
				)}
				{...(id && { id })}
				{...(value && { value })}
				{...(disabled && { disabled: true })}
				{...(autoComplete && { autoComplete })}
				{...(handleChange && { onChange: handleChange })}
				{...(handleKeyDown && { onKeyDown: handleKeyDown })}
				{...(validation && validation.register(name, validation.rules))}
				{...(validationStyleError && { style: styleError })}
			/>

			{validationMessageError && <p className='small font-medium text-error'>{validationMessageError}</p>}
		</>
	)
}

function InputMaterial(props) {
	const {
		id = 'input',
		type = 'text',
		handlerEnterKey = false,
		handlerChange = e => {},
		className = {
			container: '',
			input: '',
			label: '',
		},
		label = 'Label :P',
	} = props

	return (
		<div className={twMerge(`relative z-0 w-full  ${className.container}`)}>
			<input
				type={type}
				onChange={e => {
					handlerChange(e)
				}}
				id={id}
				onKeyDown={event => {
					if (event.key === 'Enter' && handlerEnterKey) handlerEnterKey(event)
				}}
				name={`${id}`}
				className={twMerge(
					`border-1 peer text-paragraph block w-full appearance-none rounded border-gray-300 bg-transparent px-2 py-1 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:font-medium dark:focus:border-primary-500 ${className.input}`
				)}
				placeholder=' '
			/>
			<label
				htmlFor={id}
				className={twMerge(
					`text-paragraph absolute left-1 top-2 z-10 origin-[0] -translate-y-4 scale-75 transform bg-white px-2 duration-300 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:px-2 peer-focus:text-primary-600 dark:bg-default-800 peer-focus:dark:text-primary-500 ${className.label}`
				)}>
				{label}
			</label>
		</div>
	)
}

function InputCheckbox({ label = '', checked = false, className = '', handleChange = () => {} }) {
	return (
		<label className='text-paragraph flex max-w-max cursor-pointer items-center font-semibold'>
			<input
				type='checkbox'
				checked={checked}
				onChange={handleChange}
				className={twMerge(
					'mr-2 h-4 w-4 appearance-none rounded border border-default-300 bg-white checked:bg-primary-600 focus:ring-transparent dark:checked:bg-primary-600',
					className
				)}
			/>
			{label}
		</label>
	)
}

function InputRadio({
	label = false,
	id = '',
	value = '',
	checked = false,
	disabled = false,
	handleChange = () => {},
}) {
	return (
		<>
			<input
				id={id}
				type='radio'
				value={value}
				onChange={handleChange}
				checked={checked}
				disabled={disabled}
				className='peer h-4 w-4 cursor-pointer border bg-white text-primary-500 focus:ring-transparent disabled:border-neutral-200 disabled:bg-neutral-100 dark:checked:bg-primary-500 dark:disabled:border-gray-600 dark:disabled:bg-gray-400'
			/>
			{label && (
				<label
					htmlFor={id}
					className='text-paragraph ml-2 cursor-pointer font-semibold peer-disabled:text-neutral-400'>
					{label}
				</label>
			)}
		</>
	)
}

Input.Icon = InputIcon
Input.IconDebouced = InputIconDebouced
Input.Material = InputMaterial
Input.Checkbox = InputCheckbox
Input.Radio = InputRadio

export default Input

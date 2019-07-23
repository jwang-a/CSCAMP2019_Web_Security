import time

def genmoves(flag):
	UPPER = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
	LOWER = 'abcdefghijklmnopqrstuvwxyz'
	NUMBER = '0123456789'
	SYMBOL = '!@#$%^&*()_-+={[]},.<>?/"\':;\\`~'
	INSTRUCTION_SET = 'WASDT'
	instruction = ''
	state = 0
	for i in flag:
		instruction+=INSTRUCTION_SET[state]
		instruction+='T'
		if i in UPPER:
			state+=1
			instruction+=INSTRUCTION_SET[(UPPER.index(i)%4)]*(UPPER.index(i)//4+1)
		elif i in LOWER:
			state+=2
			instruction+=INSTRUCTION_SET[(LOWER.index(i)%4)]*(LOWER.index(i)//4+1)
		elif i in NUMBER:
			state+=3
			instruction+=INSTRUCTION_SET[(NUMBER.index(i)%4)]*(NUMBER.index(i)//4+1)
		elif i in SYMBOL:
			state+=4
			instruction+=INSTRUCTION_SET[(SYMBOL.index(i)%4)]*(SYMBOL.index(i)//4+1)
		else:
			print(f'Error : character {i} not allowed in name')
			exit()
		state%=4
	return instruction

def printboard(coins,maze,pos,cnt,name):
	maze[pos[0]] = maze[pos[0]][:pos[1]]+'P'+maze[pos[0]][pos[1]+1:]
	if coins>999999999999999:
		coins = str(coins)[:12]+'...'
	else:
		coins = str(coins).rjust(15,'0')
	print(f'\nPlayer : {name}, Coins : {coins}, Posx : {pos[1]}, Posy : {pos[0]}, Move : {cnt}\n')
	for i in maze:
		print('   ',i)
	print('')
	del maze
	input('Press Enter to make next move')

def play(instruction,name):
	MAZE = ['####### #### ########## ######',
		'#G  #     ## ########## #G # #',
		'###   ### ##            ## # #',
		'######### ################ # #',
		'       ## ###############  # #',
		' ##### ## ###G######      ## #',
		' #   # ##     ###### #### ## #',
		' # # # ############# ##       ',
		' ### # ##   ######## ## # ## #',
		'     # ## # #   ####    ##### ',
		'###### ## #   # ############# ',
		'###### ######## # # ######### ',
		'###                    # #####',
		'### ##########  ###  ##  #####',
		'### ########  #  ### #########',
		'### ##          ###  #########',
		'### ## ####     ##############',
		'    ## #### # ###         ####',
		' ##### #### # ########### ####',
		'##   # ####   #      ## # ####',
		'G  # # #####  ######    # ####',
		'#### # ##### ############ ####',
		'#### # ##### ############ ####',
		'  ##   # ###        #G     ###',
		'# ###### ### #################',
		'# #####   ## ##      ## ######',
		'# #####   ## ####### ## ######',
		'# #####   ##         ## ######',
		'#         ## ########## ######',
		'#######   #  ########## ######']
	TARGET = 2808105575711258370791697394157944328155155906789677687474958661283526492836783696408387361472780860727352611765933763840576600663259954546059635296944187148317743540303146644525980119168670531488321433926130348110800429658298098202912335779259551226817811227646653464752562475775091830017512462514514250437879697550831742252253178101104478886802616811946922219475306250666315055304115079855859857518538886472169790302469443931801671038578454640709492353493910827680712857345688697915168893890979773377644932478957304083472584171511
	pos = [15,15]
	coins = 0
	cnt = 0
	print('Preparing',end='',flush=True)
	time.sleep(1)
	print('.',end='',flush=True)
	time.sleep(1)
	print('.',end='',flush=True)
	time.sleep(1)
	print('.',end='',flush=True)
	time.sleep(1)
	print('')
	printboard(coins,MAZE.copy(),pos,cnt,name)
	for i in instruction:
		if i=='W':
			pos[0]-=1
		elif i=='A':
			pos[1]-=1
		elif i=='S':
			pos[0]+=1
		elif i=='D':
			pos[1]+=1
		elif i=='T':
			pos[0],pos[1]=pos[1],pos[0]
		if pos[0]<0:
			pos[0]+=30
		if pos[0]>=30:
			pos[0]-=30
		if pos[1]<0:
			pos[1]+=30
		if pos[1]>=30:
			pos[1]-=30
		if MAZE[pos[0]][pos[1]]=='#':
			print('Your player hit the wall and Died')
			return False
		coins = coins*900+(pos[0]*30+pos[1])
		cnt+=1
		printboard(coins,MAZE.copy(),pos,cnt,name)
	if MAZE[pos[0]][pos[1]]!='G':
		print('Failed to reach goal')
	if coins!=TARGET:
		print('Failed to collect correct amount of gold')
		return False
	return True


if __name__=='__main__':
	while True:
		print('\n')
		print('✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙')
		print('✙                                               ✙')
		print('✙               GAMES OF DUNGEONS               ✙')
		print('✙                                               ✙')
		print('✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙ ✙')
		print('\n')
		name = input('Enter name to start : ')
		moves = genmoves(name)
		print('\nThe AI has automatically customized a series of instructions for you\n')
		print('Your moves :')
		print(moves)
		print('\nStarting game')
		result = play(moves,name)
		print('Finished game\n')
		if result is True:
			print('Congratulations!')
			print(f'Your flag is {name}\n')
		else:
			print('Too bad. Try harder next time\n')
		choice = input('Play Again? (Yes/No) : ').strip()
		if choice!='Yes':
			break

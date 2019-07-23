TARGET = 2808105575711258370791697394157944328155155906789677687474958661283526492836783696408387361472780860727352611765933763840576600663259954546059635296944187148317743540303146644525980119168670531488321433926130348110800429658298098202912335779259551226817811227646653464752562475775091830017512462514514250437879697550831742252253178101104478886802616811946922219475306250666315055304115079855859857518538886472169790302469443931801671038578454640709492353493910827680712857345688697915168893890979773377644932478957304083472584171511
CHARSET = ['ABCDEFGHIJKLMNOPQRSTUVWXYZ',
	   'abcdefghijklmnopqrstuvwxyz',
	   '0123456789',
	   '!@#$%^&*()_-+={[]},.<>?/"\':;\\`~']

PATH = []
while TARGET>0:
	pos = TARGET%900
	PATH.append((pos%30,pos//30))
	TARGET//=900
PATH.append((15,15))
PATH = PATH[::-1]

L = len(PATH)
COMMAND = ''
for i in range(L-1):
	if PATH[i+1][0]==PATH[i][1] and PATH[i+1][1]==PATH[i][0]:
		COMMAND+='T'
	elif PATH[i+1][0]==(PATH[i][0]+1)%30:
		COMMAND+='D'
	elif PATH[i+1][0]==(PATH[i][0]+29)%30:
		COMMAND+='A'
	elif PATH[i+1][1]==(PATH[i][1]+1)%30:
		COMMAND+='S'
	elif PATH[i+1][1]==(PATH[i][1]+29)%30:
		COMMAND+='W'
COMMAND = COMMAND.split('T')

STATE_REV_MAP = {'W':0,'A':1,'S':2,'D':3}
STATE = []
for i in COMMAND:
	STATE.append(STATE_REV_MAP[i[-1]])

L = len(STATE)
TYPE_REV_MAP = {1:0,2:1,3:2,0:3}
TYPE = []
for i in range(L-1):
	TYPE.append(TYPE_REV_MAP[(STATE[i+1]-STATE[i]+4)%4])

FLAG = ''
for idx,i in enumerate(COMMAND[1:-1]):
	FLAG+=CHARSET[TYPE[idx]][(len(i)-2)*4+STATE_REV_MAP[i[0]]]
FLAG+='}'
print(FLAG)
